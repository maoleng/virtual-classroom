<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\UserRole;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\Question;
use App\Models\User;
use Faker\Factory as Faker;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{

    private Generator $faker;

    public function __construct()
    {
        $this->faker = Faker::create('vi_VN');
    }

    public function run(): void
    {
        $this->createUsers(20);
        $this->createCourses(50);
        $this->createLectures();
        $this->createQuestions();
    }

    public function createQuestions()
    {
        $user_ids = User::query()->where('role', UserRole::STUDENT)->get()->pluck('id')->toArray();
        $lecture_ids = Lecture::query()->get()->pluck('id')->toArray();

        $questions = [];
        foreach ($lecture_ids as $lecture_id) {
            foreach ($user_ids as $user_id) {
                $times = $this->faker->randomElement([0, 0, 0, 1, 1, 2, 3]);
                for ($i = 0; $i <= $times; $i++) {
                    $questions[] = [
                        'id' => Str::uuid(),
                        'content' => $this->faker->sentence(10),
                        'lecture_id' => $lecture_id,
                        'user_id' => $user_id,
                        'created_at' => now(),
                    ];
                }
            }
        }

        Question::query()->insert($questions);
    }

    private function createUsers($count): void
    {
        $users = [];
        for ($i = 3; $i <= $count; $i++) {
            $email = $this->faker->email;
            $users[] = [
                'id' => Str::uuid(),
                'name' => $this->faker->name(),
                'email' => $email,
                'password' => '$2y$10$y05/OqLoH0/1uQdbL2FhmeQHZXVDbbw/k45w0O49JhN69emKYuBTO',
                'avatar' => 'https://i.pinimg.com/736x/b7/03/e8/b703e86875fc4642fb4a40a30df868a4.jpg',
                'role' => random_int(1, 2),
                'token' => $email,
                'created_at' => $this->faker->dateTimeBetween('-2 years', '-1 year'),
            ];
        }
        User::query()->create([
            'name' => 'Admin',
            'email' => 'admin',
            'password' => '1234',
            'avatar' => 'https://media.istockphoto.com/id/160231072/photo/gold-crown.jpg?s=612x612&w=0&k=20&c=zHY9w7ujhZCg-uKTHEeLyFc6SZVXaolE9YCRY58FbTA=',
            'role' => UserRole::ADMIN,
            'token' => 'admin',
            'created_at' => now(),
        ]);
        User::query()->create([
            'name' => 'Teacher',
            'email' => 'teacher',
            'password' => '1234',
            'avatar' => 'https://media.istockphoto.com/id/160231072/photo/gold-crown.jpg?s=612x612&w=0&k=20&c=zHY9w7ujhZCg-uKTHEeLyFc6SZVXaolE9YCRY58FbTA=',
            'role' => UserRole::TEACHER,
            'token' => 'teacher',
            'created_at' => now(),
        ]);
        User::query()->create([
            'name' => 'Student',
            'email' => 'student',
            'password' => '1234',
            'avatar' => 'https://media.istockphoto.com/id/160231072/photo/gold-crown.jpg?s=612x612&w=0&k=20&c=zHY9w7ujhZCg-uKTHEeLyFc6SZVXaolE9YCRY58FbTA=',
            'role' => UserRole::STUDENT,
            'token' => 'student',
            'created_at' => now(),
        ]);
        User::query()->insert($users);
    }

    private function createCourses($count): void
    {
        $user_ids = User::query()->where('role', UserRole::TEACHER)->get()->pluck('id')->toArray();
        $courses = [];
        for ($i = 3; $i <= $count; $i++) {
            $name = $this->faker->sentence(8);
            $courses[] = [
                'id' => Str::uuid(),
                'name' => $name,
                'slug' => Str::slug($name),
                'thumbnail' => $this->faker->imageUrl,
                'title' => $this->faker->sentence(12),
                'description' => $this->faker->sentence(300),
                'preview_video' => 'oFgg7K2tpfk',
                'duration' => random_int(15, 25).' hours',
                'price' => random_int(100, 500) * 1000,
                'user_id' => $this->faker->randomElement($user_ids),
                'is_verify' => true,
                'rating' => (float) (random_int(3, 4).'.'.random_int(1, 9)),
                'created_at' => $this->faker->dateTimeBetween('-2 years'),
            ];
        }
        $name_and_thumbnails = [
            'The Complete HTML & CSS Bootcamp 2023 Edition' => 'https://eduvibe.devsvibe.com/main/wp-content/uploads/2023/03/course-27-590x430.webp',
            'Grow Personal Financial Security Thinking & Principles' => 'https://eduvibe.devsvibe.com/main/wp-content/uploads/2023/03/course-32-590x430.webp',
            'The Complete Guide to Build RESTful API Application' => 'https://eduvibe.devsvibe.com/main/wp-content/uploads/2023/03/course-38-590x430.webp',
            'Competitive Strategy Law for Management Consultants' => 'https://eduvibe.devsvibe.com/main/wp-content/uploads/2023/03/course-30-590x430.webp',
            'Machine Learning A-Z: Hands-On Python and java' => 'https://eduvibe.devsvibe.com/main/wp-content/uploads/2023/03/course-39-590x430.webp',
            'Learning How To Write As A Professional Author' => 'https://eduvibe.devsvibe.com/main/wp-content/uploads/2023/03/course-33-590x430.webp',
            'Educating Through Christ to Learn And to Serve' => 'https://eduvibe.devsvibe.com/main/wp-content/uploads/2023/01/course-02-2-590x430.webp',
            'Web Development Masterclass & Certifications' => 'https://eduvibe.devsvibe.com/main/wp-content/uploads/2023/03/course-37-590x430.webp',
            'The Complete Python Bootcamp From Zero to Hero' => 'https://eduvibe.devsvibe.com/main/wp-content/uploads/2023/03/course-26-590x430.webp',
            'Advanced Java Programming with Eclipse' => 'https://eduvibe.devsvibe.com/main/wp-content/uploads/2023/03/course-35-590x430.webp',
            'Ultimate AWS Certified Cloud Practitioner – 2023' => 'https://eduvibe.devsvibe.com/main/wp-content/uploads/2023/03/course-34-590x430.webp',
        ];
        foreach ($name_and_thumbnails as $name => $thumbnail) {
            $courses[] = [
                'id' => Str::uuid(),
                'name' => $name,
                'slug' => Str::slug($name),
                'thumbnail' => $thumbnail,
                'title' => $this->faker->sentence(12),
                'description' => $this->faker->sentence(300),
                'preview_video' => 'oFgg7K2tpfk',
                'duration' => random_int(15, 25).' hours',
                'price' => random_int(100, 500) * 1000,
                'user_id' => $this->faker->randomElement($user_ids),
                'is_verify' => true,
                'rating' => (float) (random_int(3, 4).'.'.random_int(1, 9)),
                'created_at' => now()->subMinutes(random_int(1, 10)),
            ];
        }
        Course::query()->insert($courses);
    }


    private function createLectures(): void
    {
        $course_ids = Course::query()->get()->pluck('id')->toArray();
        $lectures = [];
        foreach ($course_ids as $course_id) {
            $count_lectures = random_int(5, 12);
            for ($i = 1; $i <= $count_lectures; $i++) {
                $name = $this->faker->sentence(random_int(6, 8));
                $lectures[] = [
                    'id' => Str::uuid(),
                    'name' => $name,
                    'slug' => Str::slug($name),
                    'document' => $this->faker->randomHtml(6),
                    'video' => 'wVboOz_O8rE',
                    'order' => $i,
                    'study_minutes' => random_int(20, 90),
                    'course_id' => $course_id,
                    'created_at' => $this->faker->dateTimeBetween('-2 years'),
                ];
            }
        }

        Lecture::query()->insert($lectures);
    }


}
