<?php
/**
 * Copyright 2018 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
namespace Google\Cloud\Test\FrontController;

use Google\Cloud\TestUtils\AppEngineDeploymentTrait;

use PHPUnit\Framework\TestCase;

/**
 * @group deploy
 */
class DeployTest extends TestCase
{
    use AppEngineDeploymentTrait;

    public function testIndex()
    {
        // Access the homepage.
        $response = $this->client->get('');
        $this->assertEquals('200', $response->getStatusCode());
    }

    public function testHomepagePhpIs404()
    {
        $this->expectException('GuzzleHttp\Exception\ClientException');
        $this->expectExceptionMessage('404 Not Found');
        // ensure homepage.php is a 404.
        $response = $this->client->get('/homepage.php');
        $this->assertEquals('404', $response->getStatusCode());
    }

    public function testContact()
    {
        // Access the helloworld page.
        $response = $this->client->get('/contact.php');
        $this->assertEquals('200', $response->getStatusCode());
    }
}