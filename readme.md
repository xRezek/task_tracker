# Task Tracker

Task Tracker is a simple command-line application to manage tasks. You can add, update, delete, list, and mark tasks with different statuses.

## Features

- Add new tasks
- Update existing tasks
- Delete tasks
- Mark tasks with different statuses (todo, doing, done)
- List tasks by status (todo, doing, done, all)

## Requirements

- PHP 7.0 or higher

## Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/yourusername/task_tracker.git
    ```
2. Navigate to the project directory:
    ```sh
    cd task_tracker
    ```

## Usage

Run the `task_tracker.php` script with the desired command and parameters:

### Add a Task

```sh
php task_tracker.php add "Your task description"
```

### Update a Task

```sh
php task_tracker.php update <task_number> "New task description"
```

### Delete a Task

```sh
php task_tracker.php delete <task_number>
```

### List Tasks

```sh
php task_tracker.php list [todo | doing | done | all]
```

### Mark a Task

```sh
php task_tracker.php mark <status> <task_number>
```
The idea of this project is from: https://roadmap.sh/projects/task-tracker