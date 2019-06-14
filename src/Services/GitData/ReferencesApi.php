<?php

/*
 * This file is part of the jiannei/easy-github.
 *
 * (c) jiannei <longjian.huang@aliyun.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Jiannei\EasyGithub\Services\GitData;

use Jiannei\EasyGithub\Api;

class ReferencesApi extends Api
{
    private $owner;

    private $repo;

    private $ref;

    /**
     * ReferencesApi constructor.
     *
     * @param $owner
     * @param $repo
     * @param $ref
     */
    public function __construct($owner, $repo, $ref)
    {
        $this->owner = $owner;
        $this->repo = $repo;
        $this->ref = $ref;
    }

    public function get(...$args)
    {
        $this->setHeaders(['Accept' => 'application/json']);
        $this->formatOptions('query');

        return $this->request('GET', "https://api.github.com/repos/{$this->owner}/{$this->repo}/git/refs/{$this->ref}", $args);
    }

    public function create($args)
    {
        $this->authorize('Docs.ApiV3.GitData.References.create', $this->owner);

        $this->setHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$this->githubToken['access_token'],
            ]
        );
        $this->formatOptions('body', json_encode($args, 320));

        return $this->request('POST', "https://api.github.com/repos/{$this->owner}/{$this->repo}/git/refs");
    }
}
