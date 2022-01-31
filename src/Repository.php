<?php

namespace App;

use App\Parking\Parking;

class Repository
{
    private $savePath = '../data/';

    public function setSavePath(string $dir): void
    {
        $this->savePath = $dir;
    }

    public function getSavePath(): string
    {
        return $this->savePath;
    }

    public function save(Parking $data): void
    {
        $id = $this->nextId();
        file_put_contents($this->getFileName($id), serialize($data));
    }

    public function get($id): Parking
    {
        $readFile = $this->getFileName($id);

        if (!is_file(trim($readFile))) {
            throw new \DomainException('Файл не найден');
        }

        return unserialize(file_get_contents($readFile));
    }

    public function delete($id): void
    {
        $readFile = $this->getFileName($id);

        if (!is_file(trim($readFile))) {
            throw new \DomainException('Файл не найден');
        }

        unlink($readFile);
    }

    public function getAll(): array
    {
        $objectArr = [];

        $files = scandir($this->savePath);
        foreach ($files as $file) {
            if (preg_match('#([\d])+\.data#', $file, $matches)) {
                if (isset($matches[1])) {
                    $objectArr[] = $this->get($matches[1]);
                }
            }
        }

        return $objectArr;
    }

    private function getFileName($id): string
    {
        return $this->savePath . $id . '.data';
    }

    private function nextId(): int
    {
        $files = scandir($this->savePath);

        return array_reduce($files, function ($accum, $item) {
            preg_match('#([\d])+\.data#', $item, $matches);
            if (isset($matches[1]) && $matches[1] >= $accum) {
                return ++$matches[1];
            }
            return $accum;
        }, 1);
    }
}