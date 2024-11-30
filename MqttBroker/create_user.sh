#!/bin/sh

PASSWD_FILE="/mosquitto/config/passwd"
USERNAME="testServer"
PASSWORD="Ssy0MpLdMIdXtau"

# Add user if not exists
if [ -f "$PASSWD_FILE" ]; then
    if ! grep -q "^$USERNAME:" "$PASSWD_FILE"; then
        echo "Adding user $USERNAME."
        mosquitto_passwd -b "$PASSWD_FILE" "$USERNAME" "$PASSWORD"
    else
        echo "User $USERNAME already exists."
    fi
else
    echo "Creating password file and adding user $USERNAME."
    mosquitto_passwd -c -b "$PASSWD_FILE" "$USERNAME" "$PASSWORD"
fi

# Start the Mosquitto broker
echo "Starting Mosquitto broker."
exec mosquitto -c /mosquitto/config/mosquitto.conf
