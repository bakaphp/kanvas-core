<?php
declare(strict_types=1);

namespace Tests\Feature\Apps\Apps\Actions;

use Kanvas\Companies\Companies\Actions\UpdateCompaniesAction;
use Kanvas\Companies\Companies\DataTransferObject\CompaniesPutData;
use Kanvas\Companies\Companies\Models\Companies;
use Tests\TestCase;

final class UpdateCompaniesActionTest extends TestCase
{
    /**
     * Test Create Apps Action.
     *
     * @return void
     */
    public function testCreateAppsAction() : void
    {
        $company = Companies::factory()->create();
        $faker = \Faker\Factory::create();

        $data = [
            'url' => $faker->company,
        ];

        //Create new AppsPostData
        $dtoData = CompaniesPutData::fromArray($data);

        $updateCompany = new UpdateCompaniesAction($dtoData);

        $this->assertInstanceOf(
            Companies::class,
            $updateCompany->execute($company->getKey())
        );
    }
}
