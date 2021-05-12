// Desktop sidebar
Spruce.store('sidebar', {
    open: true,
    toggle() {
        this.open = !this.open
    },
    close() {
        this.open = false
    }
});

// Mobile sidebar
Spruce.store('mobile', {
    sidebar: {
        open: false,
        toggle() {
            this.open = !this.open
        },
        close() {
            this.open = false
        },
    },
});

Spruce.store('notification', {
    open: false,
    toggle() {
        this.open = !this.open;
    },
    close() {
        this.open = false;
    }
});


Spruce.store('profile', {
    open: false,
    toggle() {
        this.open = !this.open;
    },
    close() {
        this.open = false;
    }
});


function getThemeFromLocalStorage() {
    // if user already changed the theme, use it
    if (window.localStorage.getItem('dark')) {
        return JSON.parse(window.localStorage.getItem('dark'))
    }

    // else return their preferences
    return (
        !!window.matchMedia &&
        window.matchMedia('(prefers-color-scheme: dark)').matches
    )
}

Spruce.store('theme', {
    'dark': getThemeFromLocalStorage(),
    toggle() {
        this.dark = !this.dark;
        window.localStorage.setItem('dark', this.dark)
    }
});

