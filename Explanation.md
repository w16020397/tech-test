## Design Decisions
- Cache utilized when converting. I came to the conclusion that once a conversion has occurred, that record will never change. The only event that had to occur on a record that already exists is the creation of the log to indicate a new conversion has happened. You would use this kind of approach in a high traffic environment to avoid unnecessary database queries and processing.
- I was going to go with a controller per function for this task to respect the single responsibility principle. But for this example, it seemed slightly overkill.
- I used a service layer to handle business logic to ensure my controllers are light and easy to read.
- I used a repository layer to handle database queries to ensure my service layer is light and easy to read.
- I have used requests to validate the incoming data when creating a new conversion to ensure a user is unable to send data that is out of the scope of the application.
- I use resources to return data to the user. I do this to ensure I'm returning things consistently and to make things easier to format in the future. Also if I were to add a sensitive field to the conversion model, it would not be automatically included unless I specify.
