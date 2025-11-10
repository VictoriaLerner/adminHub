## Admin Hub — project and test setup

App URL: http://localhost:5002

### Requirements
- Docker and Docker Compose
- GNU Make
- (Optional) Node.js and npm — typically run inside the container via Makefile targets

### Quick start
1) Copy `.env` into `src` (if it’s not there yet):
```bash
cp src/.env.example src/.env  # if the example exists
```

2) Spin up and prepare the environment with a single command:
```bash
make init
```
What `init` does:
- Rebuilds and starts containers
- Runs `composer install` inside the PHP container
- Generates `APP_KEY`
- Runs migrations with seed (`migrate:fresh --seed`)
- Installs npm packages and builds the frontend (`npm install && npm run build` in `src`)

3) The app will be available at `http://localhost:5002`

### Useful commands (Makefile)
```bash
make up           # start containers
make down         # stop containers
make rebuild      # rebuild and start
make bash         # enter the php container
make dev-clean    # migrate:fresh --seed (full DB reset and seeding)
make npm-install  # npm install in src
make npm-build    # npm run build in src
make test         # run tests (phpunit inside the container)
```

### Tests
- If containers are already running:
```bash
make test
```

- On first (cold) start, prepare the environment first:
```bash
make init
# then you can immediately
make test
```

- You don’t need to recreate data before every run. Reset the DB only when needed (e.g., if you hit a 401 due to tokens/sessions):
```bash
make dev-clean
make test
```

### Container access
```bash
make bash  # you’ll land in /var/www/html (mapped from ./src on the host)
```

### Services
- Nginx: `localhost:5002`
- PHP (FPM): container `admin-hub-php`
- MySQL 8: host port `4308`, container `admin-hub-mysql`

### Notes
- All commands are defined in the `Makefile` — check it for up-to-date targets and behavior.
- After making code changes, always run tests (`make test`).
