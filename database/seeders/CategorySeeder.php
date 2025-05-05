<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Development', 'description' => 'Development related tasks'],
            ['name' => 'Design', 'description' => 'Design related tasks'],
            ['name' => 'Testing', 'description' => 'Testing related tasks'],
            ['name' => 'Deployment', 'description' => 'Deployment related tasks'],
            ['name' => 'Maintenance', 'description' => 'Maintenance related tasks'],
            ['name' => 'Documentation', 'description' => 'Documentation related tasks'],
            ['name' => 'Research', 'description' => 'Research related tasks'],
            ['name' => 'Marketing', 'description' => 'Marketing related tasks'],
            ['name' => 'Sales', 'description' => 'Sales related tasks'],
            ['name' => 'Support', 'description' => 'Support related tasks'],
            ['name' => 'HR', 'description' => 'HR related tasks'],
            ['name' => 'Finance', 'description' => 'Finance related tasks'],
            ['name' => 'Legal', 'description' => 'Legal related tasks'],
            ['name' => 'Operations', 'description' => 'Operations related tasks'],
            ['name' => 'Customer Service', 'description' => 'Customer Service related tasks'],
            ['name' => 'Quality Assurance', 'description' => 'Quality Assurance related tasks'],
            ['name' => 'Product Management', 'description' => 'Product Management related tasks'],
            ['name' => 'Project Management', 'description' => 'Project Management related tasks'],
            ['name' => 'Business Analysis', 'description' => 'Business Analysis related tasks'],
            ['name' => 'Data Analysis', 'description' => 'Data Analysis related tasks'],
            ['name' => 'Data Science', 'description' => 'Data Science related tasks'],
            ['name' => 'Data Engineering', 'description' => 'Data Engineering related tasks'],
            ['name' => 'DevOps', 'description' => 'DevOps related tasks'],
            ['name' => 'Cybersecurity', 'description' => 'Cybersecurity related tasks'],
            ['name' => 'Network Administration', 'description' => 'Network Administration related tasks'],
            ['name' => 'System Administration', 'description' => 'System Administration related tasks'],
            ['name' => 'Cloud Computing', 'description' => 'Cloud Computing related tasks'],
            ['name' => 'Artificial Intelligence', 'description' => 'Artificial Intelligence related tasks'],
            ['name' => 'Machine Learning', 'description' => 'Machine Learning related tasks'],
            ['name' => 'Blockchain', 'description' => 'Blockchain related tasks'],
            ['name' => 'Internet of Things', 'description' => 'Internet of Things related tasks'],
            ['name' => 'Augmented Reality', 'description' => 'Augmented Reality related tasks'],
            ['name' => 'Virtual Reality', 'description' => 'Virtual Reality related tasks'],
            ['name' => 'Game Development', 'description' => 'Game Development related tasks'],
            ['name' => 'Mobile Development', 'description' => 'Mobile Development related tasks'],
            ['name' => 'Web Development', 'description' => 'Web Development related tasks'],
            ['name' => 'Desktop Development', 'description' => 'Desktop Development related tasks'],
            ['name' => 'Embedded Systems', 'description' => 'Embedded Systems related tasks'],
            ['name' => 'Game Design', 'description' => 'Game Design related tasks'],
            ['name' => 'UI/UX Design', 'description' => 'UI/UX Design related tasks'],
            ['name' => 'Graphic Design', 'description' => 'Graphic Design related tasks'],
            ['name' => '3D Modeling', 'description' => '3D Modeling related tasks'],
            ['name' => 'Animation', 'description' => 'Animation related tasks'],
            ['name' => 'Video Editing', 'description' => 'Video Editing related tasks'],
            ['name' => 'Content Creation', 'description' => 'Content Creation related tasks'],
            ['name' => 'Social Media Management', 'description' => 'Social Media Management related tasks'],
            ['name' => 'SEO', 'description' => 'SEO related tasks'],
            ['name' => 'SEM', 'description' => 'SEM related tasks'],
            ['name' => 'Email Marketing', 'description' => 'Email Marketing related tasks'],
            ['name' => 'Affiliate Marketing', 'description' => 'Affiliate Marketing related tasks'],
            ['name' => 'Influencer Marketing', 'description' => 'Influencer Marketing related tasks'],
            ['name' => 'Public Relations', 'description' => 'Public Relations related tasks'],
            ['name' => 'Event Planning', 'description' => 'Event Planning related tasks'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
