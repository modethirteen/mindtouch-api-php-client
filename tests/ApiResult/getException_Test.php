<?php declare(strict_types=1);
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
namespace MindTouch\Http\Tests\ApiResult;

use MindTouch\Http\ApiResult;
use MindTouch\Http\Tests\MindTouchHttpUnitTestCase;

class getException_Test extends MindTouchHttpUnitTestCase {

    /**
     * @test
     */
    public function Can_get_exception_type() : void {

        // arrange
        $data = [
            'status' => 500,
            'body' => [
                'error' => [
                    'message' => 'foo',
                    'exception' => 'Api.Middleware.BarException'
                ]
            ]
        ];
        $result = new ApiResult($data);

        // act
        $result = $result->getException();

        // assert
        $this->assertEquals('Api.Middleware.BarException', $result);
    }

    /**
     * @test
     */
    public function Will_get_null_if_no_exception_type() : void {

        // arrange
        $data = [
            'status' => 500,
            'body' => [
                'error' => [
                    'message' => 'foo'
                ]
            ]
        ];
        $result = new ApiResult($data);

        // act
        $result = $result->getException();

        // assert
        $this->assertNull($result);
    }
}
