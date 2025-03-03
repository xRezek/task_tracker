<?php
$filename = __DIR__ . "/tasks.json";

if (!file_exists($filename)) {
  $tasks = [];
} else {
  $tasks = json_decode(file_get_contents($filename), true);
}
if ($argc < 2) {
  echo "Please enter a command [add | update | delete | list] [parameters]\n";
  exit;
}

switch ($argv[1]) {
  case "add":
    if ($argc < 3) {
      echo "Please enter a task to add\n";
      exit(1);
    }
    if ($argc == 3) {
      $tasks[] = ["task" => $argv[2], "status" => "todo", "created_at" => date("Y-m-d H:i:s"), "updated_at" => "none"];
      file_put_contents($filename, json_encode($tasks, JSON_PRETTY_PRINT));
      echo "Task added successfully\n";
    }elseif ($argc > 3) {
      echo "Please enter a task in quotes\n";
      exit(1);
    } 
    else {
      echo "Please enter a task in quotes\n";
      exit(1);
    }
    file_put_contents($filename, json_encode($tasks, JSON_PRETTY_PRINT));
  case "update":
    if ($argc < 4) {
      echo "Please enter a task number and the new task description\n";
      exit(1);
    }
    if (!isset($tasks[$argv[2] - 1])) {
      echo "Task not found\n";
      exit(1);
    }
    $tasks[$argv[2] - 1]["task"] = $argv[3];
    $tasks[$argv[2] - 1]["updated_at"] = date("Y-m-d H:i:s");
    file_put_contents($filename, json_encode($tasks, JSON_PRETTY_PRINT));
    echo "Task updated successfully\n";
    break;
    break;
  case "delete":
    if ($argc < 3) {
      echo "Please enter a task number to delete\n";
      exit(1);
    } elseif (!isset($tasks[$argv[2] - 1])) {
      echo "Task not found\n";
      exit(1);
    }
    array_splice($tasks, $argv[2] - 1, 1);
    file_put_contents($filename, json_encode($tasks, JSON_PRETTY_PRINT));
    echo "Task deleted successfully\n";
    break;
  case "list":
    if ($argc == 3) {
      switch ($argv[2]) {
        case "todo":
          foreach ($tasks as $index => $task) {
            if ($task["status"] == "todo") {
              echo $index + 1 . ". " . $task["task"] . " | " . $task["status"] . " | " . $task["created_at"] . " | " . $task["updated_at"] . "\n";
            }
          }
          break;
        case "done":
          foreach ($tasks as $index => $task) {
            if ($task["status"] == "done") {
              echo $index + 1 . ". " . $task["task"] . " | " . $task["status"] . " | " . $task["created_at"] . " | " . $task["updated_at"] . "\n";
            }
          }
          break;
        case "doing":
          foreach ($tasks as $index => $task) {
            if ($task["status"] == "doing") {
              echo $index + 1 . ". " . $task["task"] . " | " . $task["status"] . " | " . $task["created_at"] . " | " . $task["updated_at"] . "\n";
            }
          }
          break;
        case "all":
          foreach ($tasks as $index => $task) {
            echo $index + 1 . ". " . $task["task"] . " | " . $task["status"] . " | " . $task["created_at"] . " | " . $task["updated_at"] . "\n";
          }
          break;
        default:
          echo "Invalid status\n";
          exit(1);
          break;
      }
    }
    break;
  case "mark":
    if ($argc < 4) {
      echo "Please enter a status and a task number\n";
      exit(1);
    }
    switch ($argv[2]) {
      case "done":
        if (!isset($tasks[$argv[3] - 1])) {
          echo "Task not found\n";
          exit(1);
        }
        $tasks[$argv[3] - 1]["status"] = "done";
        $tasks[$argv[3] - 1]["updated_at"] = date("Y-m-d H:i:s");
        file_put_contents($filename, json_encode($tasks, JSON_PRETTY_PRINT));
        echo "Task marked as done\n";
        break;
      case "doing":
        if (!isset($tasks[$argv[3] - 1])) {
          echo "Task not found\n";
          exit(1);
        }
        $tasks[$argv[3] - 1]["status"] = "doing";
        $tasks[$argv[3] - 1]["updated_at"] = date("Y-m-d H:i:s");
        file_put_contents($filename, json_encode($tasks, JSON_PRETTY_PRINT));
        echo "Task marked as doing\n";
        break;
      case "todo":
        if (!isset($tasks[$argv[3] - 1])) {
          echo "Task not found\n";
          exit(1);
        }
        $tasks[$argv[3] - 1]["status"] = "todo";
        $tasks[$argv[3] - 1]["updated_at"] = date("Y-m-d H:i:s");
        file_put_contents($filename, json_encode($tasks, JSON_PRETTY_PRINT));
        echo "Task marked as todo\n";
        break;
      default:
        echo "Invalid status\n";
        echo "Please enter a valid status [done | doing | todo]\n";
        exit(1);
        break;
    }
}
