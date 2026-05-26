<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rifalsya | Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-slate-900 font-sans">

    <nav class="fixed w-full z-50 bg-white/90 backdrop-blur-md border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <span class="text-2xl font-black tracking-tighter mx-auto md:mx-0">Welcome</span>
            <div class="hidden md:flex gap-10 text-sm font-bold uppercase tracking-widest text-slate-500">
                <a href="#about" class="hover:text-black hover:font-medium transition">About</a>
                <a href="#work" class="hover:text-black hover:font-medium transition">Work</a>
                <a href="#skills" class="hover:text-black hover:font-medium transition">Skills</a>
                <a href="#contact" class="hover:text-black hover:font-medium transition">Contact</a>
            </div>
        </div>
    </nav>

    <section id="about" class="pt-40 pb-24 px-6 bg-white">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-16 items-start">
            <div class="prose prose-slate prose-lg max-w-xl text-slate-600 break-words">
                <h1 class="text-7xl font-black mb-10 leading-none text-slate-950">
                    {{ $profile->headline ?? 'Building Digital Solutions.' }}
                </h1>
                <div class="leading-relaxed space-y-4">
                    {!! $profile->about_me ?? 'Deskripsi belum diisi.' !!}
                </div>
            </div>

            <div class="relative sticky top-24 h-[500px]">
                <div class="absolute inset-0 bg-teal-950 rounded-[2rem] transform translate-x-4 translate-y-4"></div>

                <div class="bg-slate-200 w-full h-full rounded-[2rem] overflow-hidden border-4 border-white shadow-lg relative z-10">
                    @if(isset($profile->profile_photo))
                        <img src="{{ asset('storage/' . $profile->profile_photo) }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-slate-400">
                            <span class="font-bold tracking-widest uppercase">Add Photo</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section id="work" class="py-24 bg-slate-50 px-6">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-5xl font-black mb-16 text-center text-slate-950">What I Do</h2>
            <div class="grid md:grid-cols-2 gap-10">
                @foreach($portofolios as $project)
                <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-lg hover:shadow-2xl transition duration-500">
                    <img src="{{ asset('storage/' . $project->image) }}" class="w-full h-80 object-cover rounded-2xl mb-8">

                    <div class="flex justify-between items-center mb-4 text-xs font-bold uppercase tracking-wider">
                        <span class="text-teal-600">{{ $project->category }}</span>
                        <span class="text-slate-400 font-medium">Client: {{ $project->client_name ?? '-' }}</span>
                    </div>

                    <h3 class="text-3xl font-bold my-3 text-slate-950">{{ $project->title }}</h3>
                    <p class="text-slate-600 mb-6 leading-relaxed">{{ $project->description }}</p>

                    <div class="flex justify-between items-center text-sm font-bold uppercase tracking-widest border-t border-slate-100 pt-6 text-slate-500">
                        <span>{{ $project->role }}</span>
                        <span>{{ $project->year?->format('d - m - Y') }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="skills" class="py-24 bg-white px-6">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-5xl font-black mb-12 text-center text-slate-950">I Can</h2>
            <div class="flex flex-col gap-10">
                @foreach($skills as $skill)
                    <div class="bg-slate-50 p-10 md:p-16 rounded-3xl border border-slate-100 shadow-xl">
                        <div class="prose prose-slate prose-lg max-w-none text-slate-700 leading-relaxed space-y-6">
                            {!! $skill->name !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="contact" class="py-24 bg-black text-white px-6 text-center">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-6xl font-black mb-10 text-white">Let’s talk</h2>
            <p class="text-xl text-slate-400 mb-12">I'm currently available for freelance projects.</p>

            <div class="flex flex-col md:flex-row justify-center items-center gap-4 max-w-3xl mx-auto">

                <a href="mailto:{{ $contact->email ?? '#' }}" class="inline-flex items-center gap-3 bg-zinc-900 border border-zinc-800 px-8 py-4 rounded-full text-lg font-bold transition hover:bg-zinc-800 hover:scale-105 duration-300 w-full md:w-auto justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-blue-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0l-7.5-4.615a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                    <span>{{ $contact->email ?? 'Email belum diatur' }}</span>
                </a>

                <a href="https://wa.me/{{ $contact->nomor_telepon ?? '#' }}" class="inline-flex items-center gap-3 bg-zinc-900 border border-zinc-800 px-8 py-4 rounded-full text-lg font-bold transition hover:bg-zinc-800 hover:scale-105 duration-300 w-full md:w-auto justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-6 h-6 text-green-500">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.003 5.372 5.378 0 12.013 0c3.213.012 6.233 1.277 8.513 3.566 2.273 2.28 3.527 5.314 3.524 8.523-.006 6.637-5.381 12.01-12.02 12.01-2.007-.001-3.98-.501-5.733-1.45L0 24zm6.59-4.846c1.655.989 3.513 1.514 5.412 1.516 5.495 0 9.97-4.474 9.975-9.976.002-2.665-1.034-5.171-2.919-7.054C17.202 1.757 14.71 .72 12.017.719c-5.498 0-9.975 4.477-9.98 9.978-.002 1.977.518 3.906 1.507 5.626L2.49 21.608l5.333-1.4c1.6.874 3.396 1.334 5.224 1.338zm10.252-7.502c-.286-.143-1.693-.836-1.954-.931-.26-.095-.45-.143-.64.143-.189.286-.733.931-.898 1.121-.165.19-.33.214-.616.071-.286-.143-1.21-.446-2.305-1.424-.853-.76-1.429-1.698-1.596-1.984-.165-.286-.018-.441.125-.582.13-.127.286-.333.43-.5.143-.166.189-.286.286-.476.095-.19.047-.357-.024-.5-.071-.143-.64-1.543-.877-2.11-.23-.556-.464-.48-.64-.489-.164-.008-.353-.01-.542-.01-.189 0-.498.07-.759.357-.26.286-.994.972-.994 2.37 0 1.397 1.018 2.748 1.159 2.939.143.19 1.996 3.05 4.839 4.277.677.293 1.205.468 1.618.599.68.216 1.3.185 1.79.112.546-.08 1.692-.692 1.93-1.36.238-.667.238-1.238.166-1.36-.071-.122-.26-.194-.546-.337z"/>
                    </svg>
                    <span>{{ $contact->nomor_telepon ?? 'Nomor belum diatur' }}</span>
                </a>

            </div>
        </div>
    </section>

</body>
</html>
