<?php
/**
 * MindTouch HTTP
 * Copyright (C) 2006-2018 MindTouch, Inc.
 * www.mindtouch.com  oss@mindtouch.com
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
namespace MindTouch\Http\tests\HttpPlug\CurlInvoke;

use MindTouch\Http\HttpPlug;
use MindTouch\Http\HttpResult;
use MindTouch\Http\tests\MindTouchHttpUnitTestCase;

class get_Test extends MindTouchHttpUnitTestCase  {

    /**
     * @test
     */
    public function Can_invoke_get() {

        // arrange
        $plug = $this->newHttpBinPlug()->at('anything');

        // act
        $result = $plug->get();

        // assert
        $this->assertEquals(HttpResult::HTTP_SUCCESS, $result->getStatus());
        $this->assertEquals(HttpPlug::METHOD_GET, $result->getBody()->getVal('method'));
    }

    /**
     * @test
     */
    public function Can_invoke_get_with_credentials() {

        // arrange
        $plug = $this->newHttpBinPlug()->at('basic-auth', 'qux', 'baz')
            ->withCredentials('qux', 'baz');

        // act
        $result = $plug->get();

        // assert
        $this->assertEquals(HttpResult::HTTP_SUCCESS, $result->getStatus());
    }
}
