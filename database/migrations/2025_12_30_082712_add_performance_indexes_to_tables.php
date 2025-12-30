<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Add index on slug for faster product lookups
            $table->index('slug', 'products_slug_index');
            
            // Add index on subcategory_id for faster joins
            $table->index('subcategory_id', 'products_subcategory_id_index');
            
            // Add composite index for common queries
            $table->index(['subcategory_id', 'id'], 'products_subcategory_id_composite');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->index('slug', 'categories_slug_index');
            $table->index('name', 'categories_name_index');
        });

        Schema::table('subcategories', function (Blueprint $table) {
            $table->index('slug', 'subcategories_slug_index');
            $table->index('category_id', 'subcategories_category_id_index');
            $table->index('name', 'subcategories_name_index');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->index('created_at', 'contacts_created_at_index');
        });

        // Add indexes to power-related tables if they exist
        if (Schema::hasTable('powertype_values')) {
            Schema::table('powertype_values', function (Blueprint $table) {
                $table->index('product_id', 'powertype_values_product_id_index');
                $table->index('powertype_id', 'powertype_values_powertype_id_index');
            });
        }

        if (Schema::hasTable('powertypes')) {
            Schema::table('powertypes', function (Blueprint $table) {
                $table->index('power_id', 'powertypes_power_id_index');
            });
        }

        if (Schema::hasTable('applications')) {
            Schema::table('applications', function (Blueprint $table) {
                $table->index('product_id', 'applications_product_id_index');
            });
        }

        if (Schema::hasTable('features')) {
            Schema::table('features', function (Blueprint $table) {
                $table->index('product_id', 'features_product_id_index');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex('products_slug_index');
            $table->dropIndex('products_subcategory_id_index');
            $table->dropIndex('products_subcategory_id_composite');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropIndex('categories_slug_index');
            $table->dropIndex('categories_name_index');
        });

        Schema::table('subcategories', function (Blueprint $table) {
            $table->dropIndex('subcategories_slug_index');
            $table->dropIndex('subcategories_category_id_index');
            $table->dropIndex('subcategories_name_index');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->dropIndex('contacts_created_at_index');
        });

        if (Schema::hasTable('powertype_values')) {
            Schema::table('powertype_values', function (Blueprint $table) {
                $table->dropIndex('powertype_values_product_id_index');
                $table->dropIndex('powertype_values_powertype_id_index');
            });
        }

        if (Schema::hasTable('powertypes')) {
            Schema::table('powertypes', function (Blueprint $table) {
                $table->dropIndex('powertypes_power_id_index');
            });
        }

        if (Schema::hasTable('applications')) {
            Schema::table('applications', function (Blueprint $table) {
                $table->dropIndex('applications_product_id_index');
            });
        }

        if (Schema::hasTable('features')) {
            Schema::table('features', function (Blueprint $table) {
                $table->dropIndex('features_product_id_index');
            });
        }
    }
};
