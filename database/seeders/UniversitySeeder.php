<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\University;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $universities = [
            [
                'name' => 'Massachusetts Institute of Technology',
                'country' => 'United States',
                'city' => 'Cambridge',
                'description' => 'MIT is a world-renowned private research university known for its programs in engineering, science, and technology.',
                'website' => 'https://web.mit.edu',
                'qs_ranking' => 1,
                'times_ranking' => 2,
                'programs' => ['Computer Science', 'Engineering', 'Physics', 'Mathematics', 'Business'],
                'admission_requirements' => [
                    'gpa' => 3.7,
                    'sat_score' => 1500,
                    'toefl_score' => 100,
                    'ielts_score' => 7.0
                ],
                'tuition_fee_min' => 50000,
                'tuition_fee_max' => 60000,
                'currency' => 'USD',
                'contact_info' => [
                    'email' => 'admissions@mit.edu',
                    'phone' => '+1-617-253-1000'
                ],
                'is_active' => true
            ],
            [
                'name' => 'Stanford University',
                'country' => 'United States',
                'city' => 'Stanford',
                'description' => 'Stanford University is a leading research university known for its academic strength, wealth, proximity to Silicon Valley, and ranking as one of the world\'s top universities.',
                'website' => 'https://stanford.edu',
                'qs_ranking' => 3,
                'times_ranking' => 4,
                'programs' => ['Computer Science', 'Engineering', 'Medicine', 'Business', 'Law'],
                'admission_requirements' => [
                    'gpa' => 3.8,
                    'sat_score' => 1480,
                    'toefl_score' => 100,
                    'ielts_score' => 7.0
                ],
                'tuition_fee_min' => 55000,
                'tuition_fee_max' => 65000,
                'currency' => 'USD',
                'contact_info' => [
                    'email' => 'admission@stanford.edu',
                    'phone' => '+1-650-723-2300'
                ],
                'is_active' => true
            ],
            [
                'name' => 'University of Oxford',
                'country' => 'United Kingdom',
                'city' => 'Oxford',
                'description' => 'The University of Oxford is a collegiate research university in Oxford, England. It is the oldest university in the English-speaking world.',
                'website' => 'https://ox.ac.uk',
                'qs_ranking' => 2,
                'times_ranking' => 1,
                'programs' => ['Medicine', 'Law', 'Philosophy', 'History', 'Literature'],
                'admission_requirements' => [
                    'gpa' => 3.7,
                    'ielts_score' => 7.0,
                    'toefl_score' => 100
                ],
                'tuition_fee_min' => 25000,
                'tuition_fee_max' => 35000,
                'currency' => 'GBP',
                'contact_info' => [
                    'email' => 'admissions@ox.ac.uk',
                    'phone' => '+44-1865-270000'
                ],
                'is_active' => true
            ],
            [
                'name' => 'Harvard University',
                'country' => 'United States',
                'city' => 'Cambridge',
                'description' => 'Harvard University is a private Ivy League research university in Cambridge, Massachusetts. It is the oldest institution of higher learning in the United States.',
                'website' => 'https://harvard.edu',
                'qs_ranking' => 5,
                'times_ranking' => 3,
                'programs' => ['Medicine', 'Law', 'Business', 'Public Policy', 'Arts'],
                'admission_requirements' => [
                    'gpa' => 3.9,
                    'sat_score' => 1520,
                    'toefl_score' => 100,
                    'ielts_score' => 7.0
                ],
                'tuition_fee_min' => 50000,
                'tuition_fee_max' => 60000,
                'currency' => 'USD',
                'contact_info' => [
                    'email' => 'admissions@harvard.edu',
                    'phone' => '+1-617-495-1000'
                ],
                'is_active' => true
            ],
            [
                'name' => 'University of Cambridge',
                'country' => 'United Kingdom',
                'city' => 'Cambridge',
                'description' => 'The University of Cambridge is a collegiate research university in Cambridge, England. It is the second-oldest university in the English-speaking world.',
                'website' => 'https://cam.ac.uk',
                'qs_ranking' => 4,
                'times_ranking' => 5,
                'programs' => ['Natural Sciences', 'Engineering', 'Medicine', 'Mathematics', 'Computer Science'],
                'admission_requirements' => [
                    'gpa' => 3.7,
                    'ielts_score' => 7.0,
                    'toefl_score' => 100
                ],
                'tuition_fee_min' => 25000,
                'tuition_fee_max' => 35000,
                'currency' => 'GBP',
                'contact_info' => [
                    'email' => 'admissions@cam.ac.uk',
                    'phone' => '+44-1223-337733'
                ],
                'is_active' => true
            ],
            [
                'name' => 'ETH Zurich',
                'country' => 'Switzerland',
                'city' => 'Zurich',
                'description' => 'ETH Zurich is a public research university in Zurich, Switzerland. It is one of the world\'s leading universities in science and technology.',
                'website' => 'https://ethz.ch',
                'qs_ranking' => 6,
                'times_ranking' => 9,
                'programs' => ['Engineering', 'Computer Science', 'Mathematics', 'Physics', 'Chemistry'],
                'admission_requirements' => [
                    'gpa' => 3.5,
                    'ielts_score' => 6.5,
                    'toefl_score' => 90
                ],
                'tuition_fee_min' => 1000,
                'tuition_fee_max' => 2000,
                'currency' => 'CHF',
                'contact_info' => [
                    'email' => 'admissions@ethz.ch',
                    'phone' => '+41-44-632-1111'
                ],
                'is_active' => true
            ]
        ];

        foreach ($universities as $universityData) {
            University::create($universityData);
        }
    }
}
