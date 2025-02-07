-- Create the ENUM type for user status
CREATE TYPE user_status_enum AS ENUM ('active', 'inactive', 'banned');

-- Create the users table with ENUM for status
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) CHECK (role IN ('admin', 'organizer', 'participant')),
    name VARCHAR(255),
    avatar VARCHAR(255),
    status user_status_enum DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create a trigger to set status to 'inactive' if the role is 'organizer'
CREATE TRIGGER set_organizer_status_inactive_trigger
BEFORE INSERT ON users
FOR EACH ROW
EXECUTE FUNCTION (
    IF NEW.role = 'organizer' THEN
        NEW.status := 'inactive';
    END IF;
    RETURN NEW;
) LANGUAGE plpgsql;


-- Create the categories table
CREATE TABLE categories (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE
);

-- Create the events table
CREATE TABLE events (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    content TEXT,
    thumbnail VARCHAR(255),
    date TIMESTAMP NOT NULL,
    location VARCHAR(255),
    price DECIMAL(10, 2),
    capacity INT,
    organizer_id INT REFERENCES users(id),
    category_id INT REFERENCES categories(id),
    status VARCHAR(50) CHECK (status IN ('active', 'pending', 'completed', 'cancelled')),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    contact_email VARCHAR(255),
    contact_phone VARCHAR(255),
    video_url VARCHAR(255)
);


-- Create the tickets table
CREATE TABLE tickets (
    id SERIAL PRIMARY KEY,
    event_id INT REFERENCES events(id),
    user_id INT REFERENCES users(id),
    type VARCHAR(50) CHECK (type IN ('free', 'paid', 'VIP')),
    price DECIMAL(10, 2),
    qr_code VARCHAR(255),
    status VARCHAR(50) CHECK (status IN ('booked', 'cancelled')),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the payments table
CREATE TABLE payments (
    id SERIAL PRIMARY KEY,
    ticket_id INT REFERENCES tickets(id),
    amount DECIMAL(10, 2),
    payment_method VARCHAR(50) CHECK (payment_method IN ('Stripe', 'PayPal')),
    status VARCHAR(50) CHECK (status IN ('pending', 'completed', 'refunded')),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the notifications table
CREATE TABLE notifications (
    id SERIAL PRIMARY KEY,
    user_id INT REFERENCES users(id),
    message TEXT NOT NULL,
    type VARCHAR(50) CHECK (type IN ('email', 'site alert')),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
