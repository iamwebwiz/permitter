<?php

use App\User;
use App\UserDetail;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->createApplicant()
            ->createReviewer()
            ->createProcessor();

        $this->command->info('Users have been added to the database');
    }

    /**
     * Generate an applicant
     *
     * @return $this
     */
    private function createApplicant(): self
    {
        $applicant = factory(User::class)->create([
            'name' => 'Ezekiel',
            'last_name' => 'Oladejo',
            'email' => 'iamwebwiz@gmail.com',
        ]);

        factory(UserDetail::class)->create([
            'user_id' => $applicant->id,
            'gender' => UserDetail::MALE_GENDER,
            'occupation' => 'Software Developer',
        ]);

        $applicant->assignRole(User::APPLICANT_ROLE);

        return $this;
    }

    /**
     * Generate a reviewer
     *
     * @return $this
     */
    private function createReviewer(): self
    {
        $reviewer = factory(UserDetail::class)->create()->user;

        $reviewer->assignRole(User::REVIEWER_ROLE);

        return $this;
    }

    /**
     * Generate a processor
     *
     * @return $this
     */
    private function createProcessor(): self
    {
        $processor = factory(UserDetail::class)->create()->user;

        $processor->assignRole(User::PROCESSOR_ROLE);

        return $this;
    }
}
