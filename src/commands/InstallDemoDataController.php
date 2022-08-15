<?php

declare(strict_types=1);

namespace app\commands;

use app\models\Category;
use app\models\Partner;
use app\models\Price;
use app\models\Service;
use yii\console\Controller;

class InstallDemoDataController extends Controller
{
    private array $services = [];

    public function actionIndex(): void
    {
        $this->installCatalog();
        $this->installPartners();
    }

    private function installCatalog(): void
    {
        $categories = [];
        $catalog = json_decode(file_get_contents(__DIR__ . '/../data/catalog.json'), true);
        foreach ($catalog as $item) {
            if (!isset($categories[$item['category']])) {
                $category = new Category();
                $category->getBehavior('blameable')->value = 1;
                $category->name = $item['category'];
                $category->save();
                $categories[$item['category']] = $category->id;
            }

            $service = new Service();
            $service->getBehavior('blameable')->value = 1;
            $service->category_id = $categories[$item['category']];
            $service->name = $item['name'];
            $service->save();
            $this->services[] = $service->id;
        }
    }

    private function installPartners(): void
    {
        $partners = json_decode(file_get_contents(__DIR__ . '/../data/partners.json'), true);
        foreach ($partners as $item) {
            $partner = Partner::register($item['contactPerson'], $item['email'], $item['name'], (string) rand(1111111111, 9999999999));
            $partner->activate();
            foreach ($this->services as $serviceId) {
                $price = new Price();
                $price->partner_id = $partner->id;
                $price->price = rand(1000, 10000);
                $price->service_id = $serviceId;
                $price->save();
            }
        }
    }
}