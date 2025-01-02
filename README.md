# Blog Application

A modern blog application built with PHP, featuring user authentication, post management, and category organization.

## Project Structure
```
blog/
├── app/
│   ├── controllers/    # Application controllers
│   ├── core/          # Core framework files
│   ├── models/        # Database models
│   └── views/         # View templates
├── public/
│   ├── assets/        # Static assets (CSS, JS, images)
│   └── uploads/       # User uploaded files
├── vendor/           # Composer dependencies
├── .htaccess        # Apache configuration
├── blog.sql         # Database schema
└── composer.json    # Dependency configuration
```

## Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache web server
- Composer
- XAMPP (recommended) or similar PHP development environment

## Installation

1. Clone the repository to your XAMPP htdocs folder:
   ```bash
   cd c:/xampp/htdocs
   git clone [your-repository-url] blog
   ```

2. Install PHP dependencies:
   ```bash
   cd blog
   composer install
   ```

3. Database Setup:
   - Create a new MySQL database named 'blog'
   - Import the database schema:
     ```bash
     mysql -u root -p blog < blog.sql
     ```

4. Configure Apache:
   - Ensure mod_rewrite is enabled
   - The .htaccess file should be properly configured (already included)

5. Configure your local environment:
   - Make sure XAMPP is running (Apache and MySQL)
   - The application should be accessible at: http://localhost/blog

## Features
- User Authentication
- Blog Post Management
- Category Organization
- Image Upload Support
- User Profiles
- Email Verification

## Dependencies
- PHPMailer for email functionality
- Intervention/Image for image processing

## Development
- The application follows MVC architecture
- PSR-4 autoloading is implemented
- Database queries use prepared statements for security

## Troubleshooting
1. If you encounter permission issues:
   - Ensure the uploads directory is writable
   - Check PHP has write permissions in the project directory

2. If routes are not working:
   - Verify Apache mod_rewrite is enabled
   - Check .htaccess file is present and properly configured

## Contributing
Feel free to submit issues and pull requests

## License
[Your License Here]
