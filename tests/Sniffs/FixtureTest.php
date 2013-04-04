<?php

namespace Sniffs;

class FixtureTest extends \AbstractPhpcsTestCase
{
    /** {@inheritdoc} */
    public function fixtureSniffProvider()
    {
        // get fixture definitions from file
        $fixtures = array();
        $fixturePath = __DIR__ . '/_fixtures';
        $it = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($fixturePath),
            \RecursiveIteratorIterator::SELF_FIRST
        );
        foreach ($it as $fi) {
            $fn = substr($fi->getFilename(), -8);
            if ($fi->isFile() && $fn == '.def.php') {
                $fixture = require($fi->getPathname());
                $fixture[0] = $fi->getPath() . '/' . $fixture[0];
                $fixtures[] = $fixture;
            }
        }

        return $fixtures;
    }
}
