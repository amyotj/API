<?php

/*
 * This file is part of the Claroline Connect package.
 *
 * (c) Claroline Consortium <consortium@claroline.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Claroline\API\Request;

interface EntityInterface
{
    //currently a php array but it should be replaced by the json-schema later.
    public function properties();

    public function list($page, $limit, array $filters = []);
    public function create($data);
    public function delete($id);
    public function update($data);
}
