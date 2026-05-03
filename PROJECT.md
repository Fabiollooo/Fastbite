# Fastbite Project Overview

A fast food ordering system with role-based functionality.

## Project Description

Fastbite is a simple fast food ordering platform that allows different user roles to interact with the system in meaningful ways. The system simulates a real-world fast food restaurant environment with customers, cashiers, and kitchen staff.

## User Roles

### 1. **Customer**
- Browse available menu items
- Place orders for themselves
- Track order status (pending, cooking, ready, completed)
- Essentially like a self checkout machine

### 2. **Cashier**
- Take orders on behalf of customers (roleplay scenario)
- Process payments (roleplay scenario)
- Pass the orders to the cook role

### 3. **Cook**
- View all pending orders assigned to the kitchen
- See order details and items needed
- Mark orders as complete
- Currently read-only view for order management

## Core Features

- **User Authentication**: Login system based on user roles
- **Role-Based Access**: Different dashboards and permissions per role
- **Order Management**: Create, view, and manage food orders
- **Menu System**: Display available food items and pricing
- **Order Tracking**: Status updates as orders progress through the system

## Database Schema

### Tables
- **users**: Stores user account information (customers, cashiers, cooks)
- **roles**: Defines user types and their descriptions
- **orders**: Tracks all food orders with status and timestamps
- **menu_items**: Available food items in the system
- **order_items**: Junction table linking orders to menu items

## Future Enhancements Ideas

- Order completion time tracking
- Revenue reports for management
- Menu item inventory management
- Customer ratings and reviews
- Order delivery tracking
- Admin dashboard for analytics
