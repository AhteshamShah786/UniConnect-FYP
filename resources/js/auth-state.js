/**
 * Auth State Management
 * Handles persistent logout state across page navigation
 */

export class AuthStateManager {
    constructor() {
        this.storageKey = 'uniconnect_auth_state';
        this.initAuthState();
    }

    /**
     * Initialize auth state on page load
     */
    initAuthState() {
        // Check if user was logged out
        const authState = this.getAuthState();
        
        if (authState && authState.loggedOut) {
            // User was logged out, ensure UI reflects this
            this.ensureLoggedOutUI();
        }
    }

    /**
     * Mark user as logged out
     */
    setLoggedOut() {
        const state = {
            loggedOut: true,
            timestamp: new Date().getTime()
        };
        localStorage.setItem(this.storageKey, JSON.stringify(state));
    }

    /**
     * Mark user as logged in
     */
    setLoggedIn() {
        localStorage.removeItem(this.storageKey);
    }

    /**
     * Get current auth state
     */
    getAuthState() {
        const state = localStorage.getItem(this.storageKey);
        return state ? JSON.parse(state) : null;
    }

    /**
     * Ensure UI reflects logged-out state
     */
    ensureLoggedOutUI() {
        // Hide user-specific elements
        const userMenus = document.querySelectorAll('[data-auth-required]');
        userMenus.forEach(element => {
            element.style.display = 'none';
        });

        // Show login prompts
        const loginPrompts = document.querySelectorAll('[data-auth-prompt]');
        loginPrompts.forEach(element => {
            element.style.display = 'block';
        });

        // Redirect to home if on protected page
        const currentPath = window.location.pathname;
        if (currentPath.startsWith('/profile') || currentPath.startsWith('/networking/create')) {
            window.location.href = '/';
        }
    }

    /**
     * Clear logout state
     */
    clearLogoutState() {
        localStorage.removeItem(this.storageKey);
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', () => {
    new AuthStateManager().initAuthState();
});
