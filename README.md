# Example Docker Dev Environment for Symfony/PHP

## ./dcmd

This is a helper script to reduce keystrokes when typing verbose docker commands.  
View the file for all options.  

For any unknown shortcuts, `./dcmd` simply passes arguments through as if you were 
to write out `docker compose <command>`.  For example, try: `./dcmd help`  

To get started, run:

    ./dcmd start

This will pull and/or build images.  The first time may take a few minutes, especially 
for building an image from a Dockerfile.  Once all containers are running, several 
services will be running including nginx serving a Symfony demo app.  However, it 
won't work just yet because depdendencies have not yet been installed.  

    ./dcmd composer install

At this point the app should be running at `http://localhost/hello`    

Don't confuse docker-compose with PHP's package manager called "composer".  Running 
this command will execute the composer binary in the php container.  You only need 
to run composer install/update when adding new dependencies.  

To stop all running containers, run `./dcmd stop`.  To stop and remove the containers, 
run `./dcmd down`.  

Note: There are several services created that are not in use by the demo application, 
including MariaDb, Redis, and Mailslurper.  You can reach UI endpoints for these services 
(adminer, redis-commander) by visiting `localhost:<port>` - reference docker-compose.yml for ports.