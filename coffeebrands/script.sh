#!/bin/bash

# File to be monitored
FILE_TO_MONITOR="../includes/navigation.php"

# File to store the previous line count
LINE_COUNT_FILE="count.txt"

# Slack webhook URL
SLACK_WEBHOOK_URL="https://hooks.slack.com/services/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"

# Function to send a message to Slack
send_slack_notification() {
  local message=$1
  curl -X POST -H 'Content-type: application/json' --data "{\"text\":\"${message}\"}" $SLACK_WEBHOOK_URL
}

# Read the previous line count
if [ -f "$LINE_COUNT_FILE" ]; then
    PREVIOUS_COUNT=$(cat $LINE_COUNT_FILE)
else
    PREVIOUS_COUNT=0
fi

# Current line count
CURRENT_COUNT=$(wc -l < $FILE_TO_MONITOR)

# Compare and send notification if different
if [ "$CURRENT_COUNT" -ne "$PREVIOUS_COUNT" ]; then
    send_slack_notification "Coffeebrands.gr changes in $FILE_TO_MONITOR. Previous: $PREVIOUS_COUNT, Current: $CURRENT_COUNT"
fi

# Update the line count file
echo $CURRENT_COUNT > $LINE_COUNT_FILE
