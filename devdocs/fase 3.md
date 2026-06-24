# Fase 3 - Controladores por Comando/Consulta en la capa de Infraestructura

## Objetivo

Separar los controladores HTTP actuales en adaptadores finos del framework para cada caso de uso del dominio, siguiendo DDD + Hexagonal + CQRS.

## Estado actual detectado

Los endpoints actuales están concentrados en controladores grandes como:
- [app/Http/Controllers/AuthController.php](app/Http/Controllers/AuthController.php)
- [app/Http/Controllers/ProjectController.php](app/Http/Controllers/ProjectController.php)
- [app/Http/Controllers/PostController.php](app/Http/Controllers/PostController.php)
- [app/Http/Controllers/EmployeeController.php](app/Http/Controllers/EmployeeController.php)
- [app/Http/Controllers/TaskController.php](app/Http/Controllers/TaskController.php)
- [app/Http/Controllers/ChatController.php](app/Http/Controllers/ChatController.php)
- [app/Http/Controllers/MessageController.php](app/Http/Controllers/MessageController.php)
- [app/Http/Controllers/EventController.php](app/Http/Controllers/EventController.php)

Y están expuestos desde [routes/api.php](routes/api.php) y los archivos de rutas auxiliares bajo [routes/api](routes/api).

## Principios de diseño

1. Los controladores HTTP serán adaptadores muy finos.
2. Cada ruta debe delegar a un Command Handler o Query Handler.
3. Cada controlador debe resolver un único caso de uso.
4. El dominio no debe conocer Laravel ni HTTP.
5. Los repositorios, comandos y handlers continuarán viviendo en la capa de aplicación y dominio.

## Estructura propuesta

Por contexto, crear esta estructura bajo src:

- src/Identity/Infrastructure/Http/Controllers/Commands
- src/Identity/Infrastructure/Http/Controllers/Queries
- src/HR/Infrastructure/Http/Controllers/Commands
- src/HR/Infrastructure/Http/Controllers/Queries
- src/Projects/Infrastructure/Http/Controllers/Commands
- src/Projects/Infrastructure/Http/Controllers/Queries
- src/Collaboration/Infrastructure/Http/Controllers/Commands
- src/Collaboration/Infrastructure/Http/Controllers/Queries
- src/Communication/Infrastructure/Http/Controllers/Commands
- src/Communication/Infrastructure/Http/Controllers/Queries
- src/Events/Infrastructure/Http/Controllers/Commands
- src/Events/Infrastructure/Http/Controllers/Queries

## Plan por contexto

### 1. Identity

Rutas actuales:
- POST /auth/signin
- POST /auth/signup
- POST /auth/signout
- POST /auth/sendPasswordResetLink
- POST /auth/resetPassword
- GET /auth/user

Controladores sugeridos:
- SignInController (Command)
- SignUpController (Command)
- SignOutController (Command)
- SendPasswordResetLinkController (Command)
- ResetPasswordController (Command)
- GetAuthenticatedUserController (Query)

### 2. HR

Rutas actuales:
- GET /employees
- POST /employees
- GET /employees/{employee}
- PUT /employees/{employee}
- DELETE /employees/{employee}
- GET /employees/search
- GET /employees/{employee}/tasks
- GET /employees/{employee}/posts
- GET /employees/{employee}/events
- GET /employees/{employee}/projects

Controladores sugeridos:
- ListEmployeesController (Query)
- CreateEmployeeController (Command)
- GetEmployeeByIdController (Query)
- UpdateEmployeeController (Command)
- DeleteEmployeeController (Command)
- SearchEmployeesController (Query)
- GetEmployeeTasksController (Query)
- GetEmployeePostsController (Query)
- GetEmployeeEventsController (Query)
- GetEmployeeProjectsController (Query)

### 3. Projects

Rutas actuales:
- GET /projects
- POST /projects
- GET /projects/{project}
- PUT /projects/{project}
- DELETE /projects/{project}
- PUT /projects/{project}/updateEmployees
- PUT /projects/{project}/addTask
- GET /projects/byEmployee/{employeeId}

Controladores sugeridos:
- ListProjectsController (Query)
- CreateProjectController (Command)
- GetProjectByIdController (Query)
- UpdateProjectController (Command)
- DeleteProjectController (Command)
- UpdateProjectEmployeesController (Command)
- AddTaskToProjectController (Command)
- ListProjectsByEmployeeController (Query)

### 4. Collaboration

Rutas actuales:
- GET /posts
- POST /posts
- GET /posts/{post}
- PUT /posts/{post}
- DELETE /posts/{post}
- POST /posts/{post}/react
- GET /comments/byPost/{postId}
- POST /comments

Controladores sugeridos:
- ListPostsController (Query)
- CreatePostController (Command)
- GetPostByIdController (Query)
- UpdatePostController (Command)
- DeletePostController (Command)
- ReactToPostController (Command)
- ListCommentsByPostController (Query)
- CreateCommentController (Command)

### 5. Communication

Rutas actuales:
- POST /chats
- GET /chats/byEmployee
- GET /messages/byChat/{chatId}
- POST /messages

Controladores sugeridos:
- CreateChatController (Command)
- ListChatsByEmployeeController (Query)
- ListMessagesByChatController (Query)
- CreateMessageController (Command)

### 6. Events

Rutas actuales:
- GET /events
- POST /events
- GET /events/{event}
- PUT /events/{event}
- DELETE /events/{event}

Controladores sugeridos:
- ListEventsController (Query)
- CreateEventController (Command)
- GetEventByIdController (Query)
- UpdateEventController (Command)
- DeleteEventController (Command)

### 7. Catalogos / Soporte

Rutas actuales:
- CRUD de departments, categories, statuses, tasks y groups (según los controladores existentes y rutas asociadas)

Controladores sugeridos:
- ListDepartmentsController / CreateDepartmentController / UpdateDepartmentController / DeleteDepartmentController
- ListCategoriesController / CreateCategoryController / UpdateCategoryController / DeleteCategoryController
- ListStatusesController / CreateStatusController / UpdateStatusController / DeleteStatusController
- ListTasksController / CreateTaskController / UpdateTaskController / DeleteTaskController
- ListGroupsController / CreateGroupController / UpdateGroupController / DeleteGroupController

## Implementación recomendada

### Fase 3.1
Crear los controladores por caso de uso, uno por acción, en las carpetas de infraestructura de cada contexto.

### Fase 3.2
Cada controlador debe:
- recibir el Request HTTP
- validar los datos con Form Requests o Request DTOs
- convertirlos a un Command o Query
- invocar al handler correspondiente
- devolver una respuesta JSON o DTO de salida

### Fase 3.3
Actualizar las rutas para apuntar a estos nuevos controladores.

### Fase 3.4
Registrar los repositorios e interfaces en AppServiceProvider.

## Recomendación de naming

Usar nombres consistentes:
- ListProjectsController
- CreateProjectController
- GetProjectByIdController
- UpdateProjectController
- DeleteProjectController

Esto facilita el mantenimiento y evita que un controlador llamado ProjectController termine acumulando demasiadas responsabilidades.

## Orden de ejecución

1. Identity
2. HR
3. Projects
4. Collaboration
5. Communication
6. Events
7. Catálogos/Soporte

## Criterio de aceptación

La Fase 3 se considera completa cuando:
- cada endpoint existente está mapeado a un controlador específico por caso de uso
- no existe un controlador HTTP grande con lógica de negocio mezclada
- los handlers son invocados desde los adaptadores HTTP
- los repositorios están inyectados por dependencias
