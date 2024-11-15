import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
    connect() {
        this.element.style.transition = 'width 0.3s ease-in-out'; // Dodajemy animacjê dla szeroko¶ci
    }

    async close() {
        this.element.style.width = '0'; // Ustawiamy szeroko¶æ na 0, aby ukryæ sidebar
        await this.#waitForAnimation();
        this.element.style.display = 'none'; // Ukrywamy element po animacji
        document.getElementById('openSidebar').classList.remove('hidden'); // Pokazuje przycisk do otwierania
    }

    open() {
        this.element.style.display = 'block'; // Pokazuje sidebar
        requestAnimationFrame(() => {
            this.element.style.width = '400px'; // Ustawiamy pe³n± szeroko¶æ
        });
        document.getElementById('openSidebar').classList.add('hidden'); // Ukrywa przycisk do otwierania
    }

    #waitForAnimation() {
        return Promise.all(this.element.getAnimations().map((animation) => animation.finished));
    }
}
