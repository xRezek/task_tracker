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

  switch($argv[1]){
    case "add":
      if ($argc < 3) {
        echo "Please enter a task to add\n";
        exit(1);
      }
      $tasks[] = ["task" => $argv[2], "status" => "todo", "created_at" => date("Y-m-d H:i:s"), "updated_at" => "none"];
      file_put_contents($filename, json_encode($tasks, JSON_PRETTY_PRINT));
      echo "Task added successfully\n";
      break;
    case "update":
      if ($argc < 4) {
        echo "Please enter a task number and a new task\n";
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
    case "delete":
      if ($argc < 3) {
        echo "Please enter a task number to delete\n";
        exit(1);
      }else if (!isset($tasks[$argv[2] - 1])) {
        echo "Task not found\n";
        exit(1);
      }
      array_splice($tasks, $argv[2] - 1,1);
      file_put_contents($filename, json_encode($tasks, JSON_PRETTY_PRINT));
      echo "Task deleted successfully\n";
      break;
      
      
    
  }

  //todo impelement list command
  //todo implement mark command
  