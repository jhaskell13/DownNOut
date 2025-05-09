# Down N Out

Down N Out is a platform and API designed to monitor various services and determine their status. If any service is unresponsive or down, the system will send alerts through configured channels, including email, Slack, and webhooks. The project is still in its early stages and currently supports only monitoring of GitHub components.

## Features

- **Service Monitoring**: Currently monitors GitHub components via their API.
- **Alerting**: Sends alerts via email (more channels to be added in future).
- **Frontend**: A simple table displaying the latest alerts.

## Technologies

- **Backend**: Laravel
- **Frontend**: Vue 3 (with Inertia.js)
- **Queue System**: Laravel Queues (for processing alerts)
- **Database**: SQLite (or any database supported by Laravel)
- **Tailwind CSS**: For styling the frontend

## Current Implementation

- **Service Checker**: Uses GitHub's API to check the status of specific components.
- **Alerts**: Currently, alerts are sent via email when a GitHub service is unresponsive.
- **Frontend Table**: Displays a list of the latest alerts sent.

## Contributing

Feel free to fork the project, open issues, and submit pull requests. Contributions are welcome!

## License

This project is open-source and available under the MIT License.
