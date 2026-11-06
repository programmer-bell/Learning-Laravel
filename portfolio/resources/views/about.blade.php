<x-layout>
    <section class="space-y-16 sm:space-y-20">
        <header class="grid gap-8 border-b border-line pb-10 md:grid-cols-[minmax(0,1.4fr)_minmax(16rem,0.6fr)] md:items-end md:gap-12 md:pb-14">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.16em] text-coral">About / Engineering</p>
                <h1 class="mt-4 max-w-3xl text-4xl font-bold leading-tight tracking-tight text-ink sm:text-5xl">Backend engineering, systems design, and infrastructure.</h1>
                <p class="mt-5 max-w-2xl text-lg leading-8 text-muted">I'm Bell. I build backend services, explore system design, and automate cloud infrastructure. This portfolio is my engineering lab for practical projects, technical experiments, and continuous learning.</p>
            </div>

            <aside class="rounded-lg border border-line bg-white p-5 sm:p-6">
                <p class="text-xs font-bold uppercase tracking-[0.16em] text-teal">Current focus</p>
                <p class="mt-3 text-lg font-semibold leading-8 text-ink">Backend engineering<br>System architecture<br>DevOps engineering</p>
                <a href="https://github.com/programmer-bell" target="_blank" rel="noreferrer" class="mt-5 inline-flex items-center gap-2 font-bold text-coral transition-colors hover:text-teal">GitHub profile <span aria-hidden="true">&nearr;</span></a>
            </aside>
        </header>

        <section aria-labelledby="practice-heading">
            <div class="mb-8 max-w-2xl">
                <p class="text-xs font-bold uppercase tracking-[0.16em] text-coral">How I work</p>
                <h2 id="practice-heading" class="mt-2 text-2xl font-bold tracking-tight text-ink sm:text-3xl">Engineering interests</h2>
            </div>

            <div class="grid gap-x-8 gap-y-10 md:grid-cols-3">
                <article class="border-t-2 border-teal pt-4">
                    <p class="text-sm font-bold text-teal">01 / Backend</p>
                    <h3 class="mt-3 text-lg font-bold text-ink">Reliable services</h3>
                    <p class="mt-2 leading-7 text-muted">APIs, application design, data modeling, and dependable backend services.</p>
                </article>
                <article class="border-t-2 border-coral pt-4">
                    <p class="text-sm font-bold text-coral">02 / Architecture</p>
                    <h3 class="mt-3 text-lg font-bold text-ink">Systems and trade-offs</h3>
                    <p class="mt-2 leading-7 text-muted">System design, architecture patterns, scalability, and the trade-offs behind them.</p>
                </article>
                <article class="border-t-2 border-citrus pt-4">
                    <p class="text-sm font-bold text-teal">03 / DevOps</p>
                    <h3 class="mt-3 text-lg font-bold text-ink">Infrastructure automation</h3>
                    <p class="mt-2 leading-7 text-muted">Containers, CI/CD, cloud deployment, and infrastructure as code.</p>
                </article>
            </div>
        </section>

        <section aria-labelledby="technology-heading" class="border-t border-line pt-10 sm:pt-12">
            <div class="mb-8 max-w-2xl">
                <p class="text-xs font-bold uppercase tracking-[0.16em] text-coral">Technology</p>
                <h2 id="technology-heading" class="mt-2 text-2xl font-bold tracking-tight text-ink sm:text-3xl">Tools I work with</h2>
            </div>

            <div class="grid gap-x-10 gap-y-8 sm:grid-cols-2 lg:grid-cols-3">
                <article class="border-t border-line pt-4">
                    <h3 class="font-bold text-ink">Languages</h3>
                    <p class="mt-2 leading-7 text-muted">Python, Go, JavaScript, TypeScript, C#, C++</p>
                </article>
                <article class="border-t border-line pt-4">
                    <h3 class="font-bold text-ink">Frameworks and runtimes</h3>
                    <p class="mt-2 leading-7 text-muted">Django, FastAPI, Node.js, Express.js, Gin, Hono, .NET / ASP.NET Core</p>
                </article>
                <article class="border-t border-line pt-4">
                    <h3 class="font-bold text-ink">Databases</h3>
                    <p class="mt-2 leading-7 text-muted">MongoDB, PostgreSQL, Redis</p>
                </article>
                <article class="border-t border-line pt-4">
                    <h3 class="font-bold text-ink">Data concepts</h3>
                    <p class="mt-2 leading-7 text-muted">Vector databases, embeddings, similarity search</p>
                </article>
                <article class="border-t border-line pt-4">
                    <h3 class="font-bold text-ink">Cloud and infrastructure</h3>
                    <p class="mt-2 leading-7 text-muted">Kubernetes, Docker, GitHub Actions, AWS, Terraform, Linux, Bash</p>
                </article>
                <article class="border-t border-line pt-4">
                    <h3 class="font-bold text-ink">Developer tools</h3>
                    <p class="mt-2 leading-7 text-muted">Git, Postman</p>
                </article>
            </div>
        </section>
    </section>
</x-layout>