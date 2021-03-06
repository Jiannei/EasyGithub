<?php

/*
 * This file is part of the jiannei/easy-github.
 *
 * (c) jiannei <longjian.huang@aliyun.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Jiannei\EasyGithub\Api\Apps;

use Jiannei\EasyGithub\Api\Api;

class OAuthApps extends Api
{
    public function getAccessToken(array $params)
    {
        return $this->httpClient->withHeaders(['Accept' => 'application/json'])
            ->post('https://github.com/login/oauth/access_token', $params);
    }

    public function getAuthenticatedUser()
    {
        return $this->httpClient->get('https://api.github.com/user');
    }
}
