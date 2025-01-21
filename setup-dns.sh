#!/bin/bash

echo "Ajout des entrées DNS au fichier /etc/hosts"
sudo bash -c "echo '127.0.0.1 laravel.site1' >> /etc/hosts"
sudo bash -c "echo '127.0.0.1 laravel.site2' >> /etc/hosts"

echo "Configuration terminée. Vous pouvez accéder aux sites via http://laravel.site1 et http://laravel.site2"
