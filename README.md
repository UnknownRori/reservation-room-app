## Reservation Room App

Last of my high school web project.

## 🔨 Development

```
> git clone https://github.com/UnknownRori/reservation-room-app.git
> cd reservation-room-app

# Install dependency
> composer install

# Copy and edit .env
> cp .env.example .env
> code .env

# Generate encryption key
> php artisan key:generate

# Database migration
> php artisan migrate:fresh --seed

# Run dev server
> php artisan serve
```

## 📑 Main Requirement

- There are three type of user, `Admin`, `Reservee`, `Receptionist`.

- `Reversee` can print out reservation note.

- `Reservee` can browse hotel's facility and room's facility.

- `Admin` can add and update room data.

- `Admin` can add and update room's facility data.

- `Admin` can add and update hotel's facility.

- `Receptionist` can check reservation data.

- `Receptionist` can do filtering in reservation data.

## 🖼️ Preview
