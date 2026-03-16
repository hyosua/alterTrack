# Plan : AlterTrack → Qualité SaaS

## Phases

- [x] **Phase 1** — Landing page complète ✓
- [x] **Phase 2** — Sécurité OWASP 2025 ✓
- [x] **Phase 3** — UX Dashboard & composants ✓

---

## Phase 1 — Landing Page

**Fichier :** `resources/views/welcome.blade.php` (réécriture complète)

Sections :
1. Navigation sticky (logo + liens + CTAs + hamburger mobile Alpine.js)
2. Hero (gradient indigo, maquette CSS du dashboard, badge gratuit, 2 CTAs)
3. Bande stats (500+ alternances, 200+ entreprises, 30+ établissements)
4. 6 cartes fonctionnalités (Import Excel, Filtres, Entreprises, Étudiants, Sécurité, Gratuit)
5. Comment ça marche (3 étapes numérotées)
6. Témoignages (3 cartes fictives)
7. FAQ accordéon Alpine.js (6 questions)
8. Bande CTA finale (gradient indigo→violet)
9. Footer complet (4 colonnes)

---

## Phase 2 — Sécurité OWASP 2025

Fichiers à créer/modifier :
- `app/Http/Middleware/SecurityHeaders.php` *(nouveau)*
- `bootstrap/app.php` — enregistrer le middleware globalement
- `routes/auth.php` — throttle login (5/min) + register (3/min)
- `app/Http/Controllers/AlternanceController.php` — `$request->validated()` au lieu de `$request->all()`
- `app/Imports/AlternanceImport.php` — WithValidation + strip_tags
- `app/Imports/EntrepriseImport.php` — WithSkipDuplicates
- `app/Http/Controllers/DashboardController.php` — fix import `Entreprise` manquant (bug prod)

---

## Phase 3 — UX Dashboard & composants

Fichiers à créer/modifier :
- `resources/views/components/toast.blade.php` *(nouveau)* — auto-dismiss 4s
- `resources/views/components/breadcrumbs.blade.php` *(nouveau)*
- `resources/views/components/empty-state.blade.php` *(nouveau)*
- `resources/views/layouts/app.blade.php` — inclure `<x-toast />`
- `resources/views/layouts/navigation.blade.php` — lien Entreprises + dropdown utilisateur
- `resources/views/dashboard.blade.php` — 4 cartes stats + empty-state
- `resources/views/entreprises/index.blade.php` — breadcrumbs + empty-state
- `resources/views/alternances/create.blade.php` — breadcrumbs
- `resources/views/alternances/edit.blade.php` — breadcrumbs
- `app/Http/Controllers/DashboardController.php` — requêtes stats

---

## Vérification finale

- [ ] `/` → landing page complète et responsive
- [ ] 6 logins rapides → réponse 429
- [ ] Headers HTTP → X-Frame-Options, CSP présents
- [ ] Dashboard → 4 cartes stats avec vrais chiffres
- [ ] CRUD → toast succès/erreur visible
- [ ] Import Excel malformé → validation, pas de crash
- [ ] Mobile → hamburger fonctionnel
