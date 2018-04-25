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
namespace MindTouch\Http\Content;

/**
 * Class FileContent
 *
 * @package MindTouch\Http\Content
 */
class FileContent implements IContent {

    /**
     * @var string
     */
    private $filePath;

    /**
     * @var string
     */
    private $contentType;

    /**
     * @param string $filePath
     * @param string|null $contentType - if null or stream the content type will be determined from file path
     */
    public function __construct($filePath, $contentType = ContentType::STREAM) {
        $this->filePath = $filePath;
        if($contentType === ContentType::STREAM) {
            $finfo = finfo_open(FILEINFO_MIME);
            $contentType = finfo_file($finfo, $filePath);
            finfo_close($finfo);
        }
        $this->contentType = $contentType;
    }

    public function getContentType() { return $this->contentType; }

    public function toData() { return $this->filePath; }
}