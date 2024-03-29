@extends('layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-side-bar')
        </div>
        <div class="col-6">
            <h1>Terms of Service</h1>
            <div>
                <p>
                    By using the Ideas service, you agree to the following terms of service:
                </p>
                <ul>
                    <li>
                        You will not post any content that is illegal, harmful, threatening, abusive, harassing,
                        tortious,
                        defamatory, vulgar, obscene, libelous, invasive of another's privacy, hateful, or racially,
                        ethnically or
                        otherwise objectionable.
                    </li>
                    <li>
                        You will not post any content that you do not have a right to make available under any law or
                        under
                        contractual or fiduciary relationships.
                    </li>
                    <li>
                        You will not post any content that infringes any patent, trademark, trade secret, copyright or
                        other
                        proprietary rights of any party.
                    </li>
                    <li>
                        You will not post any unsolicited or unauthorized advertising, promotional materials, "junk
                        mail," "spam,"
                        "chain letters," "pyramid schemes," or any other form of solicitation.
                    </li>
                    <li>
                        You will not post any material that contains software viruses or any other computer code, files
                        or
                        programs designed to interrupt, destroy or limit the functionality of any computer software or
                        hardware or
                        telecommunications equipment.
                    </li>
                    <li>
                        You will not impersonate any person or entity, including, but not limited to, a Ideas official,
                        forum
                        leader, guide or host, or falsely state or otherwise misrepresent your affiliation with a person
                        or entity.
                    </li>
                    <li>
                        You will not forge headers or otherwise manipulate identifiers in order to disguise the origin
                        of any
                        content transmitted through the Service.
                    </li>
                    <li>
                        You will not "stalk" or otherwise harass another.
                    </li>
                    <li>
                        You will not collect or store personal data about other users.
                    </li>
                </ul>
                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at
                Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a
                Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the
                undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et
                Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the
                theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor
                sit amet..", comes from a line in section 1.10.32.
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
@endsection

