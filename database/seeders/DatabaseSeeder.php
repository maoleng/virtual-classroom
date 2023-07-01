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
                        'text_answer' => 'Xin chào thế giới',
                        'audio_answer' => 'https://chunk.lab.zalo.ai/0a3560510333ea6db322/0a3560510333ea6db322',
                        'video_answer' => 'https://cdn.discordapp.com/attachments/1005135147613573190/1124554958541422622/mew.mp4',
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
                'password' => '1234',
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
                'description' => $this->faker->text,
                'preview_video' => 'https://www.youtube.com/watch?v=3kVuXXAghyg',
                'duration' => random_int(15, 25).' hours',
                'price' => random_int(100, 500) * 1000,
                'user_id' => $this->faker->randomElement($user_ids),
                'is_verify' => true,
                'created_at' => $this->faker->dateTimeBetween('-2 years'),
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
                $lectures[] = [
                    'id' => Str::uuid(),
                    'name' => $this->faker->sentence(15),
                    'document' => $this->faker->randomHtml(6),
                    'video' => 'https://www.youtube.com/watch?v=ji8cjaFUIU0',
                    'order' => $i,
                    'course_id' => $course_id,
                    'created_at' => $this->faker->dateTimeBetween('-2 years'),
                ];
            }
        }

        Lecture::query()->insert($lectures);
    }


}
