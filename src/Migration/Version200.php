<?php

declare(strict_types=1);

/*
 * nature theme bundle for Contao Open Source CMS
 *
 * Copyright (C) 2022 pdir / digital agentur <develop@pdir.de>
 *
 * @package    contao-themes-net/nature-theme-bundle
 * @link       https://github.com/contao-themes-net/nature-theme-bundle
 * @license    pdir contao theme licence
 * @author     pdir GmbH <develop@pdir.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ContaoThemesNet\NatureThemeBundle\Migration;

use Contao\CoreBundle\Migration\AbstractMigration;
use Contao\CoreBundle\Migration\MigrationResult;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;

class Version200 extends AbstractMigration
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getName(): string
    {
        return 'Version 200 - NATURE Theme';
    }

    /**
     * @throws Exception|\Doctrine\DBAL\Driver\Exception
     */
    public function shouldRun(): bool
    {
        $schemaManager = $this->connection->createSchemaManager();

        if (!$schemaManager->tablesExist(['tl_content'])) {
            return false;
        }

        if (!isset($schemaManager->listTableColumns('tl_content')['customtpl'])) {
            return false;
        }

        $test = $this->connection->fetchOne("SELECT id FROM tl_content WHERE customTpl = 'ce_image_headerimage'");

        return false !== $test;
    }

    /**
     * @throws Exception|\Doctrine\DBAL\Driver\Exception
     */
    public function run(): MigrationResult
    {
        $this->connection->executeStatement("UPDATE tl_content SET customTpl = 'content_element/image/header_image_nature' WHERE customTpl = 'ce_image_headerimage'");

        // create and set header image size
        $test = $this->connection->fetchOne("SELECT id FROM tl_image_size WHERE name = 'Headerbild &#40;Fixed&#41;'");

        if(false === $test) {
            $this->connection->executeStatement("INSERT INTO `tl_image_size` (`id`, `skipIfDimensionsMatch`, `lazyLoading`, `pid`, `tstamp`, `name`, `cssClass`, `densities`, `sizes`, `width`, `height`, `resizeMode`, `zoom`, `formats`) VALUES (NULL, '0', '1', '1', '1665577831', 'Headerbild &#40;Fixed&#41;', '', '', '1x, 1.5x, 2x', '1920', '560', 'crop', '0', 'a:3:{i:0;s:12:\"png:webp,png\";i:1;s:27:\"jpg:webp,jpg;jpeg:webp,jpeg\";i:2;s:12:\"gif:webp,gif\";}');");

            $lastInsertId = $this->connection->lastInsertId();
            $this->connection->executeStatement("UPDATE tl_content SET size = 'a:3:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:2:\"".$lastInsertId."\";}' WHERE (size = '' OR size = 'a:3:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";}') AND customTpl = 'content_element/image/header_image_nature';");

            $this->connection->executeStatement("INSERT INTO `tl_image_size_item` (`id`, `invisible`, `pid`, `sorting`, `tstamp`, `media`, `densities`, `sizes`, `width`, `height`, `resizeMode`, `zoom`) VALUES (NULL, '1', ".$lastInsertId.", '128', '1665577834', '(max-width:1023px)', '', '1x, 1.5x, 2x', '1023', '560', 'crop', NULL), (NULL, '1', ".$lastInsertId.", '64', '1665577833', '(max-width:768px)', '', '1x, 1.5x, 2x', '768', '360', 'crop', NULL), (NULL, '1', ".$lastInsertId.", '32', '1665577893', '(max-width:450px)', '', '1x, 1.5x, 2x', '450', '360', 'crop', NULL);");
        }

        return $this->createResult(true);
    }
}
