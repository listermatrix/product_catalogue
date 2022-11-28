<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221107232026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $products = $schema->createTable('products');

        $products->addColumn('id',Types::INTEGER)->setAutoincrement(true);
        $products->addColumn('sku',Types::STRING);
        $products->addColumn('name',Types::STRING);
        $products->addColumn('price',Types::FLOAT);
        $products->addColumn('product_type',Types::STRING);
        $products->addColumn('size',Types::INTEGER);
        $products->addColumn('weight',Types::INTEGER);
        $products->addColumn('height',Types::INTEGER);
        $products->addColumn('width',Types::INTEGER);
        $products->addColumn('length',Types::INTEGER);
        $products->addColumn('created_at',Types::DATETIME_MUTABLE);
        $products->addColumn('updated_at',Types::DATETIME_MUTABLE);
        $products->addColumn('deleted_at',Types::DATETIME_MUTABLE);
        $products->setPrimaryKey(['id']);
        $products->addUniqueIndex(['sku']);

    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('products');
    }
}
