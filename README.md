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

![image](https://github.com/UnknownRori/reservation-room-app/assets/68576836/6380e0ca-3bd0-4342-a514-584cd135b782)

![image](https://user-images.githubusercontent.com/68576836/174503208-49a014ac-01aa-4a98-88e2-02ad85521b68.png)

![image](https://user-images.githubusercontent.com/68576836/174503236-7a596e1b-ba41-4915-84b0-4f50bd3d7a06.png)

![image](https://user-images.githubusercontent.com/68576836/174503292-dc7295da-5c60-4624-b1ac-4547d4d006eb.png)

