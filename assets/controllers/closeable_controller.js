import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
    connect() {
        this.element.style.transition = 'width 0.3s ease-in-out'; // Dodajemy animacj� dla szeroko�ci
    }

    async close() {
        this.element.style.width = '0'; // Ustawiamy szeroko�� na 0, aby ukry� sidebar
        await this.#waitForAnimation();
        this.element.style.display = 'none'; // Ukrywamy element po animacji
        document.getElementById('openSidebar').classList.remove('hidden'); // Pokazuje przycisk do otwierania
    }

    open() {
        this.element.style.display = 'block'; // Pokazuje sidebar
        requestAnimationFrame(() => {
            this.element.style.width = '400px'; // Ustawiamy pe�n� szeroko��
        });
        document.getElementById('openSidebar').classList.add('hidden'); // Ukrywa przycisk do otwierania
    }

    #waitForAnimation() {
        return Promise.all(this.element.getAnimations().map((animation) => animation.finished));
    }
}
