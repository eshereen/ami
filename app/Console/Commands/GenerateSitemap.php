<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate XML sitemap for SEO';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating sitemap...');

        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        // Add static pages
        $staticPages = [
            ['loc' => '/', 'priority' => '1.0', 'changefreq' => 'daily'],
            ['loc' => '/products', 'priority' => '0.9', 'changefreq' => 'daily'],
            ['loc' => '/genset', 'priority' => '0.9', 'changefreq' => 'daily'],
            ['loc' => '/about', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => '/services', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => '/contact', 'priority' => '0.8', 'changefreq' => 'monthly'],
        ];

        foreach ($staticPages as $page) {
            $sitemap .= $this->generateUrl(
                url($page['loc']),
                $page['priority'],
                $page['changefreq'],
                Carbon::now()
            );
        }

        // Add products
        $products = Product::select(['slug', 'updated_at'])->get();
        $this->info("Adding {$products->count()} products...");
        
        foreach ($products as $product) {
            $sitemap .= $this->generateUrl(
                route('product.show', $product->slug),
                '0.8',
                'weekly',
                $product->updated_at
            );
        }

        // Add categories
        $categories = Category::select(['slug', 'updated_at'])->get();
        $this->info("Adding {$categories->count()} categories...");
        
        foreach ($categories as $category) {
            $sitemap .= $this->generateUrl(
                route('category.show', $category->slug),
                '0.7',
                'weekly',
                $category->updated_at
            );
        }

        // Add subcategories
        $subcategories = Subcategory::select(['slug', 'updated_at'])->get();
        $this->info("Adding {$subcategories->count()} subcategories...");
        
        foreach ($subcategories as $subcategory) {
            $sitemap .= $this->generateUrl(
                route('subcategory.show', $subcategory->slug),
                '0.6',
                'weekly',
                $subcategory->updated_at
            );
        }

        $sitemap .= '</urlset>';

        // Save sitemap
        $path = public_path('sitemap.xml');
        file_put_contents($path, $sitemap);

        $this->info('Sitemap generated successfully at: ' . $path);
        $this->info('Total URLs: ' . (count($staticPages) + $products->count() + $categories->count() + $subcategories->count()));

        return Command::SUCCESS;
    }

    /**
     * Generate URL entry for sitemap
     */
    private function generateUrl($loc, $priority, $changefreq, $lastmod)
    {
        $url = '  <url>' . PHP_EOL;
        $url .= '    <loc>' . htmlspecialchars($loc) . '</loc>' . PHP_EOL;
        $url .= '    <lastmod>' . $lastmod->toW3cString() . '</lastmod>' . PHP_EOL;
        $url .= '    <changefreq>' . $changefreq . '</changefreq>' . PHP_EOL;
        $url .= '    <priority>' . $priority . '</priority>' . PHP_EOL;
        $url .= '  </url>' . PHP_EOL;
        
        return $url;
    }
}
