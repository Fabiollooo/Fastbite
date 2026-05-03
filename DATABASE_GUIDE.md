# Fastbite Database Guide

## Overview

The Fastbite database is designed to manage a fast food ordering system. Think of it as the brain of the application—it stores all information about users, food items, and orders.

---

## The Tables Explained

### 1. **roles** — User Types
Defines what kind of users can use the system.

| Column | Purpose |
|--------|---------|
| `userType` (PK) | ID (1, 2, 3, etc.) |
| `userDescription` | Role name (Customer, Cashier, Cook) |

**Example:**
```
userType | userDescription+
1        | Customer
2        | Cashier
3        | Cook
```

---

### 2. **users** — All Users
Stores information about every person using the system.

| Column | Purpose |
|--------|---------|
| `userId` (PK) | Unique user ID |
| `firstName` | User's first name |
| `lastName` | User's last name |
| `password` | Login password |
| `email` | Email address |
| `userType` (FK) | Links to `roles` table |

**Example:**
```
userId | firstName | lastName | userType (references roles.userType)
1      | John      | Doe      | 1 (Customer)
2      | Jane      | Smith    | 2 (Cashier)
3      | Bob       | Johnson  | 3 (Cook)
```

---

### 3. **menu_categories** — Food Categories
Organizes menu items into groups.

| Column | Purpose |
|--------|---------|
| `categoryId` (PK) | Unique category ID |
| `categoryName` | Category name (Burgers, Drinks, etc.) |
| `categoryDescription` | Details about the category |

**Example:**
```
categoryId | categoryName | categoryDescription
1          | Burgers      | Beef burgers and classics
2          | Drinks       | Hot and cold beverages
3          | Desserts     | Sweet treats
```

---

### 4. **menu_items** — Food Items
The actual food/drinks customers can order.

| Column | Purpose |
|--------|---------|
| `itemId` (PK) | Unique item ID |
| `itemName` | Product name (Cheeseburger, Fries, etc.) |
| `price` | Cost of the item |
| `description` | Details about the item |
| `categoryId` (FK) | Links to `menu_categories` |
| `available` | Is it available? (1 = yes, 0 = no) |

**Example:**
```
itemId | itemName          | price | categoryId (references menu_categories)
1      | Classic Burger    | 5.99  | 1 (Burgers)
2      | Fries             | 2.99  | 3 (Sides)
3      | Cola Small        | 2.49  | 2 (Drinks)
```

---

### 5. **orders** — Customer Orders
Main order information. Each order is one customer's complete purchase.

| Column | Purpose |
|--------|---------|
| `orderId` (PK) | Unique order ID |
| `customerId` (FK) | Which customer ordered |
| `cashierId` (FK) | Which cashier took the order (can be NULL if self-order) |
| `status` | Order status (pending, cooking, ready, completed) |
| `totalPrice` | Total cost of the order |
| `orderCreated` | When the order was placed |
| `orderFinished` | When the order was completed |
| `notes` | Special instructions (no onions, extra sauce, etc.) |

**Example:**
```
orderId | customerId | cashierId | status   | totalPrice | notes
1       | 1          | 2         | cooking  | 15.97      | Extra pickles
2       | 3          | NULL      | ready    | 12.48      | No onions
```

---

### 6. **order_items** — Items in Each Order
The junction table that connects orders to menu items. This lets us track **what items** are in **which orders** and **how many** of each.

| Column | Purpose |
|--------|---------|
| `orderItemId` (PK) | Unique line item ID |
| `orderId` (FK) | Which order this item belongs to |
| `itemId` (FK) | Which menu item was ordered |
| `quantity` | How many of this item |
| `priceAtTime` | What it cost when ordered |

**Example:**
```
For Order #1, the customer ordered:
orderItemId | orderId | itemId | quantity | priceAtTime
1           | 1       | 1      | 2        | 5.99 (2x Burgers)
2           | 1       | 2      | 1        | 2.99 (1x Fries)
3           | 1       | 3      | 1        | 2.49 (1x Cola)
```

---

## How They Connect

```
roles (1) ──── (many) users
               ↓
       ┌───────┴───────┐
       ↓               ↓
   (customer)      (cashier)
       
                   orders
                   ├─ customerId → users
                   ├─ cashierId → users
                   └─ (contains multiple items via order_items)
                   
order_items
├─ orderId → orders
└─ itemId → menu_items

menu_items
└─ categoryId → menu_categories
```

---

## Real-World Example

**Scenario:** Customer John (userId=1) orders 2 burgers and a drink via Cashier Jane (userId=2).

1. **Order is created** in `orders` table:
   - orderId: 5
   - customerId: 1 (John)
   - cashierId: 2 (Jane)
   - status: pending
   - totalPrice: 15.97

2. **Items are added** to `order_items` table:
   - Item 1: 2x Burger (itemId=1) @ 5.99 each
   - Item 2: 1x Cola (itemId=3) @ 2.49

3. **Cook views** the order, sees what to make

4. **Status updates** as order progresses: cooking → ready → completed

---

## Key Takeaways

- **Foreign Keys** keep data connected and consistent
- **Junction tables** (order_items) allow one-to-many relationships
- **Timestamps** track when things happen
- **Status fields** track order progress through the system
