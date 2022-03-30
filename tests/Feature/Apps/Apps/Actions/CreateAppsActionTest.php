<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Kanvas\Apps\Apps\DataTransferObject\AppsPostData;
use Kanvas\Apps\Apps\Actions\CreateAppsAction;
use Kanvas\Apps\Apps\Models\Apps;

final class CreateAppsActionTest extends TestCase
{
    /**
     * Test Create Apps Action
     *
     * @return void
     */
    public function testCreateAppsAction(): void
    {
        $data = [
            "url" => "example.com",
            "is_actived" => "1",
            "ecosystem_auth" => "1",
            "payments_active" => "1",
            "is_public" => "1",
            "domain_based" => "1",
            "name" => "CRM app 2",
            "description" => "Kanvas Application",
            "domain" => "example.com",
        ];
        //Create new AppsPostData
        $dtoData = AppsPostData::fromArray($data);

        $app = new CreateAppsAction($dtoData);

        $this->assertTrue($app->execute() instanceof Apps);


        $this->assertInstanceOf(
            AppsPutData::class,
            AppsPutData::fromArray($data)
        );
    }
}
