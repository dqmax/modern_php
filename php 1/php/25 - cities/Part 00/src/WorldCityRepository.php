<?php
declare(strict_types=1);

class WorldCityRepository {

    public function __construct(private PDO $pdo){}

    private function arrayToModel (array $entry): WorldCityModel {
        return new WorldCityModel(
                $entry['id'],
                $entry['city'],
                $entry['city_ascii'],
                (float) $entry['lat'],
                (float) $entry['lng'],
                $entry['country'],
                $entry['iso2'],
                $entry['iso3'],
                $entry['admin_name'],
                $entry['capital'],
                $entry['population']
            );
    }

    public function fetchById(int $id): ?WorldCityModel {
        $stmt = $this->pdo->prepare('SELECT * FROM `worldcities` WHERE `id` = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $entry = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!empty($entry)){
            return $this->arrayToModel($entry);
        } else {
            return null;
        }

        
    }

    public function fetch():array {
        $stmt = $this->pdo->prepare('SELECT *
            FROM `worldcities` 
            ORDER BY `population`
            DESC LIMIT 50');
        $stmt->execute();

        $models = [];
        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($entries as $entry){
            $models[] = $this->arrayToModel($entry);
        }
        
        return $models;
    }

    public function countAll(): int {
        return (int) $this->pdo
            ->query("SELECT COUNT(*) FROM cities")
            ->fetchColumn();
    }

    public function getPaginated(int $limit, int $offset): array {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM cities LIMIT :limit OFFSET :offset"
        );

        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

class Paginator
{
    public function __construct(
        private int $totalItems,
        private int $itemsPerPage,
        private int $currentPage
    ) {}

    public function getTotalPages(): int
    {
        return (int) ceil($this->totalItems / $this->itemsPerPage);
    }

    public function getOffset(): int
    {
        return ($this->currentPage - 1) * $this->itemsPerPage;
    }

    public function getLimit(): int
    {
        return $this->itemsPerPage;
    }
}


/*
    public function fetch():array {
        $chisinau = new WorldCityModel;
        $chisinau->city = 'Chisinau';
        $chisinau->country = 'Moldova';
        $chisinau->population = 900000;

        $kiev = new WorldCityModel;
        $kiev->city = 'Kiev';
        $kiev->country = 'Ukraine';
        $kiev->population = 3000000;

        $entries = [
            $chisinau,
            $kiev,
        ];

        return $entries;
    }
        */