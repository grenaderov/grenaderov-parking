<?php

namespace App;

use App\Parking\Parking;

class Repository
{
    public function __construct(private string $savePath = '../data/')
    {
    }

    public function save(Parking $parking): void
    {
        file_put_contents($this->getFileName($parking->getId()), serialize($parking));
    }

    public function findById($id): Parking
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

        $this->curId = null;

        unlink($readFile);
    }

    public function getAll(): array
    {
        $allIds = $this->getAllFileIds();

        return array_reduce($allIds, function ($carr, $item) {
            $carr[] = unserialize(file_get_contents($this->getFileName($item)));
            return $carr;
        }, []);
    }

    public function nextId(): int
    {
        $allIds = $this->getAllFileIds();

        rsort($allIds);

        return ++$allIds[0] ?? 1;
    }

    private function getAllFileIds(): array
    {
        $files = scandir($this->savePath);
        $objectArr = [];

        foreach ($files as $file) {
            if (preg_match('#([\d])+\.data#', $file, $matches)) {
                if (isset($matches[1])) {
                    $objectArr[] = $matches[1];
                }
            }
        }

        return $objectArr;
    }

    private function getFileName($id): string
    {
        return $this->savePath . $id . '.data';
    }
}