UI IMPLEMENTATION SPECIFICATION --- Antigravity

0. Document Purpose

This document is the frontend implementation specification for
Antigravity.

The implementation target is an existing Vue frontend project.
Antigravity must inspect the existing project first and implement the
UI/functionality described here without rebuilding the project
architecture.

The functional source of truth is the project's analysis and design
document:

Phan_tich_va_thiet_ke.pdf

The document defines a smart cooking-support website that helps users
search recipes, search by available ingredients, view recipe details,
request recipe suggestions, interact with an AI chatbot, manage personal
information, favorites, history, reviews, and provides an admin area for
managing recipes, ingredients, and reviews.

1. NON-NEGOTIABLE IMPLEMENTATION RULES

1.1 Scope

Antigravity is allowed to:

Inspect the complete existing Vue project.

Create and modify frontend files under src/.

Reuse the existing components, layouts, styles, routing, state
management, services, and assets when appropriate.

Create new Vue components/views/composables/services only inside
src/ when necessary.

Modify router configuration only when it is located inside src/.

1.2 Forbidden Changes

Do NOT:

Modify package.json.

Modify package-lock.json, yarn.lock, pnpm-lock.yaml, or
equivalent dependency lock files.

Modify vite.config.*.

Modify tsconfig.*.

Modify .env or .env.*.

Modify files outside src/.

Install new dependencies unless explicitly instructed.

Replace the existing Vue architecture.

Rewrite the project from scratch.

Delete existing functionality unrelated to the requested
implementation.

Create a second competing component/layout/state architecture.

Invent business rules that are not defined by the source document.

Add screens or features merely because they are common in other
cooking applications.

If an implementation requires a change outside src/, STOP and report
the reason instead of making that change.

2. SOURCE-OF-TRUTH PRIORITY

When requirements conflict, use this priority:

Phan_tich_va_thiet_ke.pdf

Explicit functional/business requirements derived from that
document.

Existing project architecture and conventions.

This UI implementation specification.

Antigravity assumptions.

Never override an explicit Use Case requirement with an assumption.

If the document does not specify a business rule:

Do not invent one.

Implement only the UI behavior necessary to support the documented
flow.

Reuse existing project behavior if it already exists.

If the behavior cannot be determined safely, keep the implementation
minimal and clearly mark the ambiguity for review.

3. PROJECT INSPECTION --- REQUIRED BEFORE CODING

Before changing code, inspect:

src/
src/components/
src/views/
src/router/
src/stores/
src/services/
src/composables/
src/assets/
src/layouts/

Also inspect existing:

App.vue

router configuration

authentication handling

API service structure

state management

reusable UI components

global styles

existing pages

existing assets

existing naming conventions

Determine:

Vue version.

JavaScript or TypeScript.

Composition API or Options API.

Router implementation.

State-management solution.

Existing CSS framework/design system.

Existing component hierarchy.

Existing authentication mechanism.

Existing API integration pattern.

Architecture rule

Use the architecture already present.

Do not create:

new architecture
+
old architecture

Create only the minimum additional structure needed.

4. SYSTEM ACTORS

The source document identifies three actors.

4.1 Guest

A visitor who has not registered/logged in.

Documented capabilities:

Register.

Search recipes.

Search by ingredients.

View recipe list.

View recipe details.

Request recipe suggestions.

Chat/request basic interaction.

4.2 Member / User

A registered and authenticated user.

Documented capabilities:

Login.

Search recipes.

Search by ingredients.

View recipe list.

View recipe details.

Save favorite recipes.

View history.

Manage personal information.

Review/rate recipes.

Chat with AI chatbot.

4.3 Admin

An authenticated administrator.

Documented capabilities:

Admin login.

Manage recipes.

Manage ingredients.

Manage reviews.

5. USE CASE INVENTORY

ID     Use Case                    Actor

UC01   Đăng nhập                   Thành viên, Admin
UC02   Đăng ký                     Khách vãng lai
UC03   Tìm kiếm món ăn             Thành viên, Khách vãng lai
UC04   Tìm kiếm theo nguyên liệu   Thành viên, Khách vãng lai, Admin
UC05   Xem danh sách món ăn        Thành viên, Khách vãng lai, Admin
UC06   Xem chi tiết món ăn         Thành viên, Khách vãng lai
UC07   Quản lý thông tin cá nhân   Thành viên
UC08   Xem lịch sử                 Thành viên
UC09   Lưu món ăn yêu thích        Thành viên
UC10   Yêu cầu gợi ý món ăn        Khách vãng lai, Thành viên
UC11   Chat yêu cầu                Khách vãng lai, Thành viên
UC12   Đánh giá món ăn             Thành viên
UC13   Quản lý món ăn              Admin
UC14   Quản lý đánh giá            Admin
UC15   Quản lý nguyên liệu         Admin

6. GLOBAL UI PRINCIPLES

The interface must prioritize:

Clear navigation.

Recipe discovery.

Ingredient-based search.

Recipe readability.

Simple interaction.

Consistent components.

Responsive layout.

Clear feedback after actions.

Do not add visual complexity that does not support a documented Use
Case.

The UI should feel like a smart cooking assistant, not a generic
CRUD dashboard.

7. APPLICATION STRUCTURE

The frontend should conceptually contain the following areas.

Public / Guest Area

Home / Recipe Discovery
Search
Ingredient Search
Recipe List
Recipe Detail
Recipe Suggestion
Chat
Register
Login

Member Area

Home / Recipe Discovery
Search
Ingredient Search
Recipe List
Recipe Detail
Favorites
History
Profile
Review
Recipe Suggestion
AI Chat

Admin Area

Admin Login
Recipe Management
Ingredient Management
Review Management

Do not force every item above to become a separate route if the existing
application architecture uses another valid pattern.

8. USE CASE → UI SPECIFICATION

UC01 --- ĐĂNG NHẬP

Actor

Thành viên

Admin

Purpose

Allow an existing account to authenticate and enter the system.

Documented flow

User chooses login.

System displays login form.

User enters account information.

User chooses Login.

System checks database.

If account exists:

login succeeds;

navigate to home.

If account does not exist:

display notification.

UI requirements

The Login UI must contain:

Account/email field according to existing backend contract.

Password field.

Login button.

Link/action to Register where applicable.

Error feedback.

Loading state during authentication.

States

idle
loading
success
authentication error
validation error

Do not invent additional authentication flows such as OTP, social login,
password reset, or two-factor authentication unless already implemented
in the existing project or explicitly requested.

9. UC02 --- ĐĂNG KÝ

Actor

Guest

Purpose

Create a new member account.

Documented flow

Guest selects Register.

System displays registration form.

Guest enters registration information.

Guest selects Register.

System checks database.

If account already exists:

display notification;

request re-entry.

If account does not exist:

save registration data;

display successful registration result.

Display home interface.

UI requirements

Registration form must support the fields required by the existing
project/backend contract.

At minimum, do not remove any field already defined by the current
implementation.

States

idle
loading
account already exists
validation error
registration success
server error

10. UC03 --- TÌM KIẾM MÓN ĂN

Actors

Member

Guest

Purpose

Search recipes by name/type/keyword.

Documented flow

User chooses recipe search.

System displays search bar.

User enters keyword.

User submits search.

System receives request.

System queries data.

System displays matching recipes.

UI

Provide:

Search input.

Search action.

Recipe result list/grid.

Loading state.

Empty-result state.

Error state.

Search result behavior

Each recipe result should provide a clear way to access the documented
recipe detail flow.

Do not invent filtering/sorting/pagination requirements unless supported
by the existing backend/project or source document.

11. UC04 --- TÌM KIẾM THEO NGUYÊN LIỆU

Actors

Member

Guest

Admin

Purpose

Find recipes based on available ingredients.

Documented flow

User chooses ingredient search.

System displays ingredient input form.

User enters ingredients.

User selects Search.

System receives request.

System queries database.

System displays results.

UI requirements

The ingredient-search UI must make entering one or more ingredients
understandable.

Use existing project components where possible.

Possible interaction patterns may include:

ingredient input;

selected ingredient list;

remove ingredient;

search button.

Do not assume advanced ingredient matching rules unless defined by the
backend/source requirements.

12. UC05 --- XEM DANH SÁCH MÓN ĂN

Actors

Member

Guest

Admin

Purpose

Display available recipes.

Documented flow

User accesses recipe-list function.

System displays recipe list.

UI

Recipe list should use a reusable recipe-card component.

Each card should expose enough information to identify the recipe and
access its details.

Required states:

loading
loaded
empty
error

13. UC06 --- XEM CHI TIẾT MÓN ĂN

Actors

Member

Guest

Purpose

Display complete recipe information.

Documented flow

User selects a recipe.

System receives request.

System queries database.

System displays:

recipe name;

ingredients;

preparation/cooking instructions;

description;

other data returned by the system.

UI hierarchy

Prioritize:

Recipe title.

Recipe image if available.

Description.

Ingredients.

Cooking instructions.

Member actions such as favorite/review where applicable.

Do not invent recipe fields that do not exist in the actual data
model/API.

14. UC07 --- QUẢN LÝ THÔNG TIN CÁ NHÂN

Actor

Member

Preconditions

User is logged in.

Purpose

Update personal information.

Documented flow

User selects profile management.

System displays current information.

User edits information.

User saves.

System updates database.

System displays result.

UI

Provide:

Current user information.

Editable fields supported by the project.

Save/update action.

Loading state.

Validation feedback.

Success/error feedback.

Do not add password-change behavior unless it is explicitly supported by
the actual project requirements.

15. UC08 --- XEM LỊCH SỬ

Actor

Member

Preconditions

Logged in.

Purpose

View activity/search history.

Documented flow

User selects History.

System queries data.

System displays history.

UI

The UI must clearly distinguish historical records from current content.

Required states:

loading
history available
empty history
error

Do not invent deletion/clear-history behavior unless explicitly defined.

16. UC09 --- LƯU MÓN ĂN YÊU THÍCH

Actor

Member

Preconditions

Logged in.

Purpose

Save a recipe and view recipes marked as favorite.

Documented flow

User selects favorite action.

System receives request.

System saves to database.

System displays success notification.

UI

Favorite action may be placed on:

Recipe card.

Recipe detail.

Use the same reusable favorite component/action wherever possible.

The favorite state must be visually understandable.

Required feedback:

saving
success
error

17. UC10 --- YÊU CẦU GỢI Ý MÓN ĂN

Actors

Guest

Member

Purpose

Allow a user to request recipe recommendations.

Documented flow

User enters request.

System receives request.

System processes recommendation.

System displays results.

UI

Provide:

Request input area.

Submit action.

Recommendation result area.

Loading state.

Empty result state if no result is returned.

Error state.

The UI must not claim that recommendations are AI-generated unless the
actual API/backend provides that behavior.

18. UC11 --- CHAT YÊU CẦU

Actors

Guest

Member

Purpose

Allow the user to chat with the system/bot to ask about recipes.

Documented flow

User enters chat content.

System receives request.

System processes request.

System returns response.

UI

Implement a reusable chat interface containing:

Message history.

User messages.

System/bot messages.

Message input.

Send action.

Loading/processing indicator.

Error feedback.

Keep the chat interface focused on the documented cooking/recipe
interaction.

Do not invent advanced AI functionality.

19. UC12 --- ĐÁNH GIÁ MÓN ĂN

Actor

Member

Preconditions

Logged in.

Purpose

Allow a member to submit a recipe review/rating.

Documented flow

User enters review.

System receives review.

System saves review to database.

System displays review.

UI

The review UI must support the fields defined by the current
backend/data contract.

If the project explicitly supports rating + comment, render both.

If the source/backend only supports comments, do not invent a rating
mechanism.

Required states:

idle
submitting
success
validation error
server error

20. UC13 --- QUẢN LÝ MÓN ĂN

Actor

Admin

Preconditions

Admin logged in.

Purpose

Add, edit, and delete recipes.

Documented flow

Admin selects recipe management.

System displays recipe list.

Admin selects add/edit/delete.

System updates database.

System displays result.

UI

Admin recipe management should provide:

Recipe list/table.

Add action.

Edit action.

Delete action.

Recipe form.

Operation feedback.

Loading state.

Error state.

Architecture

Reuse the same recipe domain components where practical, but do not
expose admin controls in public/member UI.

21. UC14 --- QUẢN LÝ ĐÁNH GIÁ

Actor

Admin

Preconditions

Admin logged in.

Purpose

Allow admin to view, edit, or delete user reviews.

Documented flow

Admin selects review management.

System displays review list.

Admin selects review to edit/delete.

System updates the system.

Data is saved to database.

System displays updated result.

UI

Provide:

Review list/table.

Edit action.

Delete action.

Review editing UI where supported.

Operation feedback.

Loading state.

Error state.

22. UC15 --- QUẢN LÝ NGUYÊN LIỆU

Actor

Admin

Preconditions

Admin logged in.

Purpose

Manage ingredient data.

Documented flow

Admin selects ingredient management.

System displays ingredient list.

Admin adds/edits/deletes ingredients.

System saves to database.

System displays result.

UI

Provide:

Ingredient list/table.

Add action.

Edit action.

Delete action.

Ingredient form.

Success/error feedback.

Loading state.

23. REUSABLE COMPONENT STRATEGY

Before creating a new component, check whether an existing component can
be reused.

Recommended conceptual components:

AppHeader
AppFooter
Navigation
SearchBar
IngredientInput
IngredientChip
RecipeCard
RecipeGrid
RecipeList
RecipeDetail
FavoriteButton
ReviewForm
ReviewList
HistoryList
ProfileForm
SuggestionForm
SuggestionResult
ChatWindow
ChatMessage
LoadingState
EmptyState
ErrorState
ConfirmDialog
Notification
AdminTable
AdminForm

These are recommendations, not mandatory filenames.

Follow existing project conventions.

24. ROUTING

Use the existing Vue Router structure.

Conceptual routes may include:

/login
/register
/
/recipes
/recipes/:id
/search
/search/ingredients
/favorites
/history
/profile
/suggestions
/chat

/admin
/admin/recipes
/admin/ingredients
/admin/reviews

However:

Do not blindly create all routes.

First inspect the existing router.

If a current route already serves a documented Use Case, reuse it.

If a route is necessary, create it inside src/router/.

25. AUTHORIZATION / UI ACCESS CONTROL

The UI must respect the documented actors.

Guest

Can access documented guest capabilities.

Member

Can access member-only functionality such as:

Favorites.

History.

Profile.

Reviews.

Admin

Can access:

Recipe management.

Ingredient management.

Review management.

Do not rely solely on hiding buttons for security. The backend remains
responsible for authorization. Frontend route/UI guards are for user
experience and navigation control.

26. API INTEGRATION

Use the project's existing API/service architecture.

Do not create a new HTTP-client architecture if one already exists.

Before implementing API calls, inspect:

src/services/
src/api/
src/stores/
src/composables/

Use the actual backend contracts when available.

Do not invent:

endpoint names;

request fields;

response fields;

authentication tokens;

IDs;

HTTP methods.

If an API contract is missing, implement the UI boundary cleanly and do
not fabricate backend behavior.

27. FORM VALIDATION

Validation must correspond to documented requirements and actual backend
contracts.

General UI behavior:

empty required input
→ validation message

submit
→ loading

server success
→ success feedback / documented navigation

server failure
→ readable error feedback

Do not invent arbitrary business constraints such as:

minimum age;

special password rules;

maximum ingredients;

mandatory rating ranges;

unless they are defined elsewhere in the project.

28. LOADING / EMPTY / ERROR STATES

Every asynchronous screen must be considered in at least these states:

Loading

Show a clear non-blocking loading state.

Success

Display returned content.

Empty

Explain that there is currently no data/result.

Error

Explain that the operation could not be completed and provide an
appropriate retry/navigation action where applicable.

Do not display a blank page during asynchronous operations.

29. UX FEEDBACK

Actions that modify data should provide feedback.

Examples:

Login
Register
Update profile
Save favorite
Submit review
Add recipe
Edit recipe
Delete recipe
Add ingredient
Edit ingredient
Delete ingredient
Edit review
Delete review

Use existing notification/toast components if available.

Do not introduce a new notification library.

30. RESPONSIVE DESIGN

The website must work on:

Desktop.

Tablet.

Mobile.

Responsive behavior must preserve:

readable recipe content;

usable search;

accessible buttons;

usable forms;

readable admin tables;

usable chat;

usable ingredient selection.

Do not merely shrink desktop layouts.

Use the existing project's responsive system/framework where available.

31. ACCESSIBILITY

Use semantic HTML and accessible interaction patterns.

Required:

Labels for form controls.

Keyboard-accessible buttons.

Meaningful button text.

Visible focus states where supported by existing design system.

Sufficient text contrast.

Alt text for meaningful recipe images where image data is available.

Do not use icons alone for critical actions unless the existing design
system provides an accessible label.

32. VISUAL DESIGN DIRECTION

The visual language should communicate:

Cooking
Food
Freshness
Clarity
Trust
Simplicity
Smart assistance

Prioritize the content itself.

Recipe images should support discovery but must not overpower:

recipe name;

ingredients;

cooking instructions;

primary actions.

Avoid excessive decoration.

33. PAGE-LEVEL ACCEPTANCE CRITERIA

Every implemented page must satisfy:

It corresponds to a documented Use Case or necessary navigation.

Actor permissions are respected.

Required data is represented.

Required user actions are available.

Documented flow can be completed.

Loading state exists where asynchronous.

Error state exists where asynchronous.

Empty state exists where applicable.

Success feedback exists where appropriate.

Existing components are reused where possible.

No duplicate architecture is introduced.

No console errors are introduced.

Responsive behavior works.

Only src/ is modified.

34. USE CASE ACCEPTANCE MATRIX

UC     Screen / UI         Main validation

UC01   Login               Authentication flow + error feedback
UC02   Register            Registration + duplicate account feedback
UC03   Recipe Search       Keyword → results
UC04   Ingredient Search   Ingredients → results
UC05   Recipe List         List rendering + states
UC06   Recipe Detail       Recipe information rendering
UC07   Profile             Edit → save → result
UC08   History             Query → history
UC09   Favorites           Save → success
UC10   Suggestion          Request → recommendation
UC11   Chat                Message → response
UC12   Review              Submit → result
UC13   Recipe Admin        Add/edit/delete
UC14   Review Admin        View/edit/delete
UC15   Ingredient Admin    Add/edit/delete

35. IMPLEMENTATION ORDER

Implement in dependency order.

Phase 1 --- Existing project analysis

Inspect the project.

Do not code before understanding the architecture.

Phase 2 --- Shared foundation

Reuse/create only necessary:

layout
navigation
buttons
forms
cards
feedback states

Phase 3 --- Authentication

UC01 Login
UC02 Register

Phase 4 --- Recipe discovery

UC03 Search
UC04 Ingredient Search
UC05 Recipe List
UC06 Recipe Detail

Phase 5 --- Member functions

UC07 Profile
UC08 History
UC09 Favorites
UC10 Suggestion
UC11 Chat
UC12 Review

Phase 6 --- Admin

UC13 Recipe Management
UC14 Review Management
UC15 Ingredient Management

Phase 7 --- Validation

Verify every UC against its documented flow.

36. ANTIGRAVITY EXECUTION PROCESS

Follow this exact process.

Step 1 --- Inspect

Read the existing Vue project.

Step 2 --- Map

Map:

existing files
→ existing architecture
→ existing routes
→ existing components
→ existing state/API

Step 3 --- Compare

Compare the existing implementation against:

UC01–UC15

Identify:

already implemented
partially implemented
missing

Step 4 --- Implement

Implement missing/incorrect UI behavior.

Reuse existing code whenever possible.

Step 5 --- Validate

For each Use Case:

Actor
↓
Entry point
↓
Screen
↓
Input
↓
Action
↓
Loading
↓
Success/Error
↓
Navigation

must match the source document.

Step 6 --- Scope check

Before finishing, verify:

No files outside src/ changed.
No dependency files changed.
No environment files changed.
No unrelated functionality removed.

37. ANTI-HALLUCINATION RULES FOR ANTIGRAVITY

These rules are mandatory.

Never invent a business rule.

If the source says:

"Nhập nguyên liệu → tìm kiếm → hiển thị kết quả"

do not automatically add:

ingredient quantity matching;

percentage matching;

nutrition calculation;

dietary filtering;

expiry detection;

AI scoring;

unless those requirements exist elsewhere in the project.

Never invent API contracts.

Do not guess endpoint names or response structures.

Never invent pages.

Do not create a dashboard, settings page, notification center, shopping
list, meal planner, or other feature unless required by the project.

Never invent roles.

Only:

Guest
Member
Admin

are documented actors.

Never silently modify architecture.

If the existing architecture can support the feature, extend it.

38. IMPORTANT SOURCE-DOCUMENT NOTES

The source document contains some textual inconsistencies.

Examples include:

Some Use Case descriptions contain wording that appears inconsistent
with the actual Use Case title.

Some actor labels in the detailed Use Cases are inconsistent with
the actor overview.

Some Use Case IDs use different formatting such as UC012, UC014,
UC015.

UC10 is documented with Guest + Member but its precondition text
mentions login.

UC13/UC14/UC15 descriptions contain actor-label inconsistencies.

Do not silently invent a correction.

For frontend implementation:

Prefer the actor/use-case overview when determining role access.

Prefer the actual event flow when determining UI behavior.

Preserve the documented feature scope.

If a contradiction affects implementation and cannot be resolved
from the existing project/backend, flag it for review rather than
inventing behavior.

39. FINAL SELF-CHECK

Before declaring implementation complete, verify all items:

Architecture

Existing Vue architecture inspected.

Existing components reused where appropriate.

No competing architecture created.

Scope

Only src/ modified.

No package files modified.

No environment files modified.

No dependency installed.

Functional coverage

UC01 implemented/verified.

UC02 implemented/verified.

UC03 implemented/verified.

UC04 implemented/verified.

UC05 implemented/verified.

UC06 implemented/verified.

UC07 implemented/verified.

UC08 implemented/verified.

UC09 implemented/verified.

UC10 implemented/verified.

UC11 implemented/verified.

UC12 implemented/verified.

UC13 implemented/verified.

UC14 implemented/verified.

UC15 implemented/verified.

UX

Loading states.

Empty states where applicable.

Error states.

Success feedback.

Responsive layout.

Accessible forms/actions.

Quality

No obvious console errors.

No broken routes.

No duplicate components without reason.

No invented business rules.

No invented API contracts.

No unrelated changes.

40. FINAL INSTRUCTION TO ANTIGRAVITY

You are an implementation agent working inside an existing Vue
frontend project.

Your job is NOT to redesign the requirements.

Your job is to:

READ EXISTING PROJECT
        ↓
READ THIS SPECIFICATION
        ↓
READ/MAP UC01–UC15
        ↓
COMPARE WITH EXISTING IMPLEMENTATION
        ↓
IMPLEMENT ONLY WHAT IS REQUIRED
        ↓
REUSE EXISTING ARCHITECTURE
        ↓
MODIFY ONLY src/
        ↓
VALIDATE AGAINST USE CASE FLOWS

The Use Case requirements are the functional source of truth.

The existing Vue project is the technical architecture source of
truth.

This document is the frontend implementation contract.

When there is uncertainty:

Do less rather than invent more.

Do not add features because they are common.

Do not redesign the system architecture.

Do not modify files outside src/.

Do not claim completion until the implementation has been checked
against UC01--UC15.