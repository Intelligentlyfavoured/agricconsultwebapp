# Agrik-Consult
Welcome to Agricultural Consultant Connect (AgriCon), a web-based application designed to bridge the gap between farmers and agricultural consultants. This platform leverages advanced matchmaking algorithms to pair farmers with expert consultants tailored to their specific needs and environmental conditions. AgriCon aims to improve agricultural practices, increase productivity, and foster sustainable farming.

## Features
-Expert Matchmaking: Connects farmers with credible agricultural consultants based on specific needs and environmental conditions.
-Review and Rating System: Allows farmers to review and rate consultant services, promoting transparency and accountability.
-Q&A Forum: Provides a robust platform for farmers to pose inquiries and receive timely responses from a diverse pool of consultants.
-Live Interaction: Facilitates direct interaction and feedback between farmers and consultants, fostering a collaborative ecosystem.
-Knowledge Sharing: Enhances knowledge-sharing and problem-solving within the agricultural community.
## Tech Stack
-Backend Framework: Laravel
-Frontend: Jetstream Livewire
## Installation
### Prerequisites
-PHP >= 7.3
-Composer
-Node.js
-NPM/Yarn
-MySQL or any other compatible database
### Steps
1. Clone the Repository
''' git clone https://github.com/yourusername/AgriCon.git
cd AgriCon '''
2. Install the dependencies
   ''' composer install
npm install
npm run dev
'''
3. Environment Setup
   Copy .env.example to .env and update the database and other configurations.
   ''' 
cp .env.example .env
php artisan key:generate
'''
4. Database Migration
   ''' php artisan migrate
'''
5. Serve the Application
   ''' 
php artisan serve
'''


