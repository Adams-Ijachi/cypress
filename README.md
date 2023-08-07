
---

# Activity Management System

The Activity Management System is designed to allow administrators to create and manage activities for users. The system supports global activities that can be applied to all users, as well as user-specific activities that can be tailored for individual users.

## Table of Contents

- [Introduction](#introduction)
- [Database Structure](#database-structure)
- [Features](#features)
- [Usage](#usage)


## Introduction

The Activity Management System provides the following key features:

1. Admin can create activities that are applied to all users.
2. Admin can edit global activities, and changes will reflect for all users.
3. Admin can view a list of registered users along with their activities.
4. Admin can edit user-specific activities without affecting global activities.
5. Admin can delete activities.
6. User-specific activities are independent of global activities once edited.

## Database Structure

The database consists of the following main tables:

1. `users`: Contains information about registered users.
    - Columns: `id`, `name`, `email`,`role`  ...

2. `global_activities`: Stores activity information.
    - Columns: `id`, `title`, `description`, `image`, ...

3. `user_activities`: Represents user-specific activities.
    - Columns: `id`, `user_id`, `global_activity_id`, `title`, `description`, `image`,`is_global` ...

## Features

### Creating Activities

- Admin can create global activities with a title, description, and an optional image.

### Global Activities

- Activities created by admin are considered global and are applied to all users.

### Editing Activities

- Admin can edit global activities, and changes will be reflected for all users.
- Admin can edit user-specific activities, and changes will only affect that user's activity.

### Viewing Users and Activities

- Admin can view a list of registered users along with their associated activities.
- Both global and user-specific activities will be displayed for each user.

### Deleting Activities

- Admin can delete global activities.

## Usage

1. Clone this repository to your local machine.
2. Configure the database connection in the `.env` file.
3. Run database migrations using `php artisan migrate` command.
4. Use Laravel's built-in authentication for admin and user management.
5. Access the admin panel to create, edit, and manage activities.

## Seeder

```
php artisan db:seed

```

