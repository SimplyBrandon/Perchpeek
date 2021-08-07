## Perchpeek - Technical Test | Time taken: 1 hour, 3 minutes.
Notes for installation
```
   #1 - configure .env
   #2 - php artisan migrate
```

Notes for use

## Commands Included
All included commands use the `tickets:` prefix to the signature.
`php artisan tickets` will list included commands.
```
> php artisan tickets:schedule

Toggles the dummy ticket testing schedule.
(Runs the following two commands at their respective intervals)
tickets:generate - 1 minute interval
tickets:process - 5 minute interval
```
```
> php artisan tickets:generate

Generate a random dummy ticket using realistic data.
```
```
> php artisan tickets:process

Process a single ticket at a time, chronologically.
```

# Endpoints Included
`php artisan route:list` will list included routes.
```
/api/open-tickets - JSON format of a Laravel Pagination (by 10) of open tickets.
/api/closed-tickets - JSON format of a Laravel Pagination (by 10) of closed tickets.
/api/users/{email}/tickets - JSON format of a Laravel Pagination (by 10) of tickets received from a specific email.
/api/stats - JSON format of statistics:
    - Total Tickets (int)
    - Unprocessed Tickets (int)
    - Most Frequent Creator (Array with keys: "creator_name", "creator_email", "tickets")
    - Last Processing Time (Human-readable string - E.G. "12 Minutes ago")
```
