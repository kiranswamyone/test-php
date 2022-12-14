<?php
/**
 * Copyright 2016 Google Inc.
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
namespace Google\Cloud\Test;

use PHPUnit\Framework\TestCase;
use Google\Cloud\TestUtils\TestTrait;
use Slim\Psr7\Factory\RequestFactory;

class LocalTest extends TestCase
{
    use TestTrait;

    public function testIndex()
    {
        $app = require __DIR__ . '/../app.php';

        // Access the modules app top page.
        $request = (new RequestFactory)->createRequest('GET', '/');
        $response = $app->handle($request);
        $this->assertEquals(200, $response->getStatusCode());
        $text = (string) $response->getBody();
        $this->assertStringContainsString('Last 10 visits:', $text);
    }
}
